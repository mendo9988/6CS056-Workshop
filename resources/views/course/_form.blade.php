@php
    $isEditing = isset($course);
    $selectedDifficulty = old('difficulty', $course->difficulty ?? 'Easy');
    $isActive = old('is_active', $course->is_active ?? true);
@endphp

<form action="{{ $isEditing ? route('courses.update', $course) : route('courses.store') }}" method="POST" class="space-y-5">
    @csrf
    @if ($isEditing)
        @method('PUT')
    @endif

    <x-input
        name="name"
        label="Course Name"
        :value="old('name', $course->name ?? '')"
        placeholder="e.g. Web Development"
        required
        autocomplete="off"
    />

    <x-textarea
        name="description"
        label="Description"
        :value="old('description', $course->description ?? '')"
        placeholder="What will students learn in this course?"
        rows="5"
        required
    />

    <div class="grid gap-5 sm:grid-cols-2">
        <x-input
            name="duration"
            label="Duration (weeks)"
            type="number"
            :value="old('duration', $course->duration ?? '')"
            placeholder="12"
            min="1"
            step="1"
            required
        />

        <x-input
            name="fee"
            label="Fee"
            type="number"
            :value="old('fee', $course->fee ?? '')"
            placeholder="15000.00"
            min="0"
            step="0.01"
            required
        />
    </div>

    <x-select name="difficulty" label="Difficulty" required>
        @foreach (['Easy', 'Medium', 'Hard'] as $difficulty)
            <option value="{{ $difficulty }}" @selected($selectedDifficulty === $difficulty)>
                {{ $difficulty }}
            </option>
        @endforeach
    </x-select>

    <div class="space-y-1.5">
        <input type="hidden" name="is_active" value="0">
        <label for="is_active" class="flex items-center gap-3 font-extrabold text-navy">
            <input
                type="checkbox"
                id="is_active"
                name="is_active"
                value="1"
                @checked((bool) $isActive)
                aria-invalid="{{ $errors->has('is_active') ? 'true' : 'false' }}"
                aria-describedby="{{ $errors->has('is_active') ? 'is_active-error' : '' }}"
                class="h-5 w-5 rounded border-2 border-sunshine text-peach focus:ring-peach"
            >
            Course is currently offered
        </label>
        <x-error name="is_active" />
    </div>

    <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-between">
        <x-button-outline :href="route('courses.index')" type="button">Back to Courses</x-button-outline>
        <x-button type="submit">{{ $isEditing ? 'Update Course' : 'Create Course' }}</x-button>
    </div>
</form>
