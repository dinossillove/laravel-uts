<div class="mb-4">
    <label class="block mb-2 font-medium">Nama Kategori</label>
    <input type="text"
           name="name"
           value="{{ old('name', $category->name ?? '') }}"
           required
           maxlength="255"
           class="w-full border border-slate-300 rounded-lg p-3">
</div>

<div class="mb-6">
    <label class="block mb-2 font-medium">Deskripsi (opsional)</label>
    <textarea name="description"
              rows="4"
              class="w-full border border-slate-300 rounded-lg p-3">{{ old('description', $category->description ?? '') }}</textarea>
</div>

<div class="flex gap-3">
    <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg cursor-pointer">
        {{ isset($category->id) ? 'Update Kategori' : 'Simpan Kategori' }}
    </button>
    <a href="{{ route('categories.index') }}"
       class="bg-slate-200 hover:bg-slate-300 px-5 py-3 rounded-lg">
        Batal
    </a>
</div>
