<button {{ $attributes->merge(['class' => 'px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700']) }}>
    {{ $slot ?? 'Register' }}
</button>
