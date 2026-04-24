<footer class="border-t bg-white mt-10">
  <div class="max-w-6xl mx-auto px-4 py-8 text-sm text-gray-600">
    &copy; {{ date('Y') }} Restu Ibu — Custom & Printing
  </div>
</footer>

<script>
  document.getElementById('menuBtn')?.addEventListener('click', () => {
    document.getElementById('menuMobile')?.classList.toggle('hidden');
  });
</script>