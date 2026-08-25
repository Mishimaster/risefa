<?php

namespace App\Services;

use App\Models\FaqEntry;
use Illuminate\Support\Collection;

class FaqMatcherService
{
    /**
     * @return array{found: bool, answer?: string, matched_question?: string, score?: float, message?: string}
     */
    public function match(string $userQuestion): array
    {
        $minScore = (float) config('rise.faq.match_threshold', 58);
        $normalizedUser = $this->normalize($userQuestion);

        if ($normalizedUser === '' || mb_strlen($normalizedUser) < 3) {
            return [
                'found' => false,
                'message' => 'Pose une question un peu plus précise pour que je puisse t\'aider.',
            ];
        }

        $entries = FaqEntry::query()->active()->get(['id', 'question', 'answer']);

        if ($entries->isEmpty()) {
            return [
                'found' => false,
                'message' => 'Je n\'ai pas encore de réponses en base. Réessaie plus tard.',
            ];
        }

        $best = $this->bestMatch($normalizedUser, $entries);

        if ($best === null || $best['score'] < $minScore) {
            return [
                'found' => false,
                'message' => 'Je n\'ai pas trouvé de réponse à cette question. Reformule ou demande à un staff sur Discord.',
            ];
        }

        return [
            'found' => true,
            'answer' => $best['entry']->answer,
            'matched_question' => $best['entry']->question,
            'score' => round($best['score'], 1),
        ];
    }

    /**
     * @param  Collection<int, FaqEntry>  $entries
     * @return array{entry: FaqEntry, score: float}|null
     */
    private function bestMatch(string $normalizedUser, Collection $entries): ?array
    {
        $best = null;

        foreach ($entries as $entry) {
            $score = $this->score($normalizedUser, $this->normalize($entry->question));

            if ($best === null || $score > $best['score']) {
                $best = [
                    'entry' => $entry,
                    'score' => $score,
                ];
            }
        }

        return $best;
    }

    private function score(string $user, string $faq): float
    {
        similar_text($user, $faq, $percent);

        $userTokens = $this->tokens($user);
        $faqTokens = $this->tokens($faq);

        if ($faqTokens === []) {
            return (float) $percent;
        }

        $overlap = count(array_intersect($userTokens, $faqTokens));
        $coverage = ($overlap / count($faqTokens)) * 100;

        // Pondération stricte : similarité globale + couverture des mots FAQ
        return ($percent * 0.55) + ($coverage * 0.45);
    }

    private function normalize(string $text): string
    {
        $text = mb_strtolower(trim($text), 'UTF-8');
        $text = $this->removeAccents($text);
        $text = preg_replace('/[^a-z0-9\s]/u', ' ', $text) ?? '';
        $text = preg_replace('/\s+/u', ' ', $text) ?? '';

        return trim($text);
    }

    /**
     * @return list<string>
     */
    private function tokens(string $normalized): array
    {
        $stopwords = [
            'a', 'au', 'aux', 'avec', 'ce', 'ces', 'dans', 'de', 'des', 'du', 'elle', 'en', 'et', 'il',
            'je', 'la', 'le', 'les', 'leur', 'lui', 'ma', 'mais', 'me', 'mes', 'moi', 'mon', 'ne', 'nos',
            'notre', 'nous', 'on', 'ou', 'par', 'pas', 'pour', 'qu', 'que', 'qui', 'sa', 'se', 'ses',
            'son', 'sur', 'ta', 'te', 'tes', 'toi', 'ton', 'tu', 'un', 'une', 'vos', 'votre', 'vous',
            'y', 'est', 'sont', 'etre', 'avoir', 'fait', 'faites', 'comment', 'quoi', 'quel', 'quelle',
            'quels', 'quelles', 'cest', 'ca',
        ];

        $parts = preg_split('/\s+/u', $normalized, -1, PREG_SPLIT_NO_EMPTY) ?: [];

        return array_values(array_filter(
            $parts,
            fn (string $token) => mb_strlen($token) >= 3 && ! in_array($token, $stopwords, true),
        ));
    }

    private function removeAccents(string $text): string
    {
        $converted = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $text);

        return is_string($converted) ? $converted : $text;
    }
}
