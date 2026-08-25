<?php

use App\Services\FaqMatcherService;
use Livewire\Component;

new class extends Component
{
    public bool $open = false;

    public string $question = '';

    /** @var list<array{role: string, text: string}> */
    public array $messages = [];

    public function mount(): void
    {
        $this->messages = [
            [
                'role' => 'bot',
                'text' => 'Salut ! Pose ta question sur Rise FA. Je réponds uniquement à partir de notre FAQ.',
            ],
        ];
    }

    public function toggle(): void
    {
        $this->open = ! $this->open;
    }

    public function ask(FaqMatcherService $matcher): void
    {
        $question = trim($this->question);

        if ($question === '') {
            return;
        }

        $this->messages[] = [
            'role' => 'user',
            'text' => $question,
        ];

        $this->question = '';

        $result = $matcher->match($question);

        if ($result['found'] ?? false) {
            $this->messages[] = [
                'role' => 'bot',
                'text' => $result['answer'],
            ];
        } else {
            $this->messages[] = [
                'role' => 'bot',
                'text' => $result['message'] ?? 'Je n\'ai pas trouvé de réponse à cette question.',
            ];
        }
    }
};
?>

<div class="fixed bottom-5 right-5 z-[80] font-sans">
  @if ($open)
    <div class="mb-3 flex h-[min(28rem,70vh)] w-[min(22rem,calc(100vw-2.5rem))] flex-col overflow-hidden rounded-2xl border border-purple-300/25 bg-black/95 shadow-[0_0_40px_rgba(168,85,247,0.25)] backdrop-blur">
      <div class="flex items-center justify-between border-b border-white/10 bg-purple-500/15 px-4 py-3">
        <div>
          <p class="text-sm font-semibold text-purple-100">Assistant Rise FA</p>
          <p class="text-xs text-slate-400">Réponses FAQ uniquement</p>
        </div>
        <button type="button" wire:click="toggle" class="rounded-lg border border-white/10 px-2 py-1 text-xs text-slate-300 hover:bg-white/10" aria-label="Fermer">
          Fermer
        </button>
      </div>

      <div class="flex-1 space-y-3 overflow-y-auto px-4 py-3" id="faq-chat-messages">
        @foreach ($messages as $message)
          <div @class([
            'max-w-[90%] rounded-xl px-3 py-2 text-sm leading-relaxed',
            'ml-auto bg-cyan-500/20 text-cyan-50' => $message['role'] === 'user',
            'mr-auto bg-white/5 text-slate-200' => $message['role'] === 'bot',
          ])>
            {{ $message['text'] }}
          </div>
        @endforeach
      </div>

      <form wire:submit="ask" class="border-t border-white/10 p-3">
        <div class="flex gap-2">
          <input
            type="text"
            wire:model="question"
            maxlength="500"
            placeholder="Ta question…"
            class="min-w-0 flex-1 rounded-xl border border-white/15 bg-black/50 px-3 py-2 text-sm text-white outline-none placeholder:text-slate-500 focus:border-purple-400/50"
          />
          <button type="submit" class="shrink-0 rounded-xl border border-purple-400/40 bg-purple-500/25 px-3 py-2 text-sm font-semibold text-purple-50 hover:bg-purple-500/35">
            Envoyer
          </button>
        </div>
      </form>
    </div>
  @endif

  <button
    type="button"
    wire:click="toggle"
    class="ml-auto flex h-14 w-14 items-center justify-center rounded-full border border-purple-300/40 bg-gradient-to-br from-purple-500 to-fuchsia-600 text-white shadow-[0_0_30px_rgba(168,85,247,0.45)] transition hover:scale-105"
    aria-label="Ouvrir l'assistant FAQ"
  >
    @if ($open)
      <span class="text-xl leading-none">×</span>
    @else
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7" aria-hidden="true">
        <path fill-rule="evenodd" d="M4.804 21.644A6.707 6.707 0 0 0 6 21.75a6.721 6.721 0 0 0 3.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 0 1-.814 1.686.75.75 0 0 0 .44 1.223ZM8.25 10.875a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25ZM10.875 12a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875-1.125a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z" clip-rule="evenodd" />
      </svg>
    @endif
  </button>
</div>
