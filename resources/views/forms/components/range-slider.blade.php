<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div
        x-data="{
            state: $wire.{{ $applyStateBindingModifiers("\$entangle('{$getStatePath()}')") }},
            hover: null
        }"
        class="flex flex-col space-y-2"
    >
        <div class="flex space-x-1">
            <template x-for="i in {{ $max ?? 5 }}" :key="i">
                <svg
                    @click="state = i"
                    @mouseenter="hover = i"
                    @mouseleave="hover = null"
                    :class="(hover ?? state) >= i ? 'text-yellow-400' : 'text-gray-300'"
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6 cursor-pointer transition-colors duration-200"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                >
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.168 3.59a1 1 0 00.95.69h3.772c.969 0 1.371 1.24.588 1.81l-3.051 2.213a1 1 0 00-.364 1.118l1.168 3.59c.3.921-.755 1.688-1.54 1.118l-3.05-2.213a1 1 0 00-1.175 0l-3.05 2.213c-.785.57-1.84-.197-1.54-1.118l1.168-3.59a1 1 0 00-.364-1.118L2.49 9.017c-.783-.57-.38-1.81.588-1.81h3.772a1 1 0 00.95-.69l1.168-3.59z"/>
                </svg>
            </template>
        </div>
        <span class="text-sm text-gray-700 font-semibold">
            Nilai: <span x-text="state"></span> / {{ $max ?? 5 }}
        </span>
    </div>
</x-dynamic-component>
