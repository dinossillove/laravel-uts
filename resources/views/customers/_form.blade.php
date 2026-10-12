<div class="mb-4">
    <label class="block mb-2 font-medium">
        Nama
    </label>

    <input type="text"
           name="name"
           value="{{ old('name', $customer->name ?? '') }}"
           required
           maxlength="255"
           class="w-full border border-slate-300 rounded-lg p-3">
</div>

<div class="mb-4">
    <label class="block mb-2 font-medium">
        Telepon
    </label>

    <input type="text"
           name="phone"
           value="{{ old('phone', $customer->phone ?? '') }}"
           required
           maxlength="20"
           class="w-full border border-slate-300 rounded-lg p-3">
</div>

<div class="mb-4">
    <label class="block mb-2 font-medium">
        Email (opsional)
    </label>

    <input type="email"
           name="email"
           value="{{ old('email', $customer->email ?? '') }}"
           maxlength="255"
           class="w-full border border-slate-300 rounded-lg p-3">
</div>

<div class="mb-6">
    <label class="block mb-2 font-medium">
        Alamat (opsional)
    </label>

    <textarea name="address"
              rows="4"
              class="w-full border border-slate-300 rounded-lg p-3">{{ old('address', $customer->address ?? '') }}</textarea>
</div>

<div class="flex gap-3">
    <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg cursor-pointer">
        {{ isset($customer->id) ? 'Update Customer' : 'Simpan Customer' }}
    </button>

    <a href="{{ route('customers.index') }}"
       class="bg-slate-200 hover:bg-slate-300 px-5 py-3 rounded-lg">
        Batal
    </a>
</div>
