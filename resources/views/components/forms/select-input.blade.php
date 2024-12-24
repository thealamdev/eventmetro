<select style="height: 40px;" {!! $attributes->merge(['class' => 'w-full border-line-base focus:ring-transparent focus:border-primary-400 rounded bg-transparent text-paragraph']) !!}>
    {{ $slot }}
</select>