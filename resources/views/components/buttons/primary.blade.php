<button {{ $attributes->merge(['type' => 'submit', 'class' => 'px-8 py-2 bg-secondary-400 transition-colors hover:bg-primary-400 text-button hover:text-white rounded']) }}>
    {{ $slot }}
</button>