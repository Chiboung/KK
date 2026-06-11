<style>
    body {
  background-color: #2e2e2e;
  color: white;
  font-family: sans-serif;
}

.theme-selector {
  padding: 16px;
  border-radius: 8px;
  background: #3a3a3a;
  display: flex;
  flex-direction: column;
  gap: 12px;
  width: 260px;
}

.theme-option {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 16px;
}

.theme-option input[type="radio"] {
  accent-color: #4caf50; /* Green by default */
}

.theme-option .gear::before {
  content: "⚙️";
}

</style>
<div class="theme-selector">
  <label class="theme-option">
    <input type="radio" name="theme" value="purple-amber">
    <span>Deep Purple & Amber</span>
    <i class="gear" style="color: #9c27b0;"></i>
  </label>

  <label class="theme-option">
    <input type="radio" name="theme" value="indigo-pink">
    <span>Indigo & Pink</span>
    <i class="gear" style="color: #3f51b5;"></i>
  </label>

  <label class="theme-option">
    <input type="radio" name="theme" value="pink-bluegrey">
    <span>Pink & Blue-grey</span>
    <i class="gear" style="color: #e91e63;"></i>
  </label>

  <label class="theme-option">
    <input type="radio" name="theme" value="purple-green" checked>
    <span>Purple & Green</span>
    <i class="gear" style="color: #9c27b0;"></i>
  </label>
</div>

<script>
    document.querySelectorAll('input[name="theme"]').forEach(input => {
  input.addEventListener('change', function () {
    switch (this.value) {
      case 'purple-amber':
        document.body.style.backgroundColor = '#673ab7';
        document.body.style.color = '#ffc107';
        break;
      case 'indigo-pink':
        document.body.style.backgroundColor = '#3f51b5';
        document.body.style.color = '#e91e63';
        break;
      case 'pink-bluegrey':
        document.body.style.backgroundColor = '#e91e63';
        document.body.style.color = '#607d8b';
        break;
      case 'purple-green':
        document.body.style.backgroundColor = '#9c27b0';
        document.body.style.color = '#4caf50';
        break;
    }
  });
});

</script>