@props(['open' => false])

<div x-data="{
    open: @js($open),
    hide() { this.open = false },
    show() { this.open = true },
    whenOpen(func) { if (this.open) $nextTick(func) },
}">
    <div
        x-on:click="show()"
        x-on:keyup.escape="close()"
    >
        {{ $trigger }}
    </div>
    <template x-teleport="body">
        <div
            class="fixed inset-0 flex h-full w-full items-center justify-center backdrop-blur backdrop-brightness-90 transition-all duration-300 ease-in-out"
            x-show="open"
            x-on:click.self="hide()"
            x-on:keyup.escape="hide()"
            x-transition.scale.out.duration.200ms
            x-transition.scale.in.duration.200ms
        >
            {{ $content }}
        </div>
    </template>
</div>
