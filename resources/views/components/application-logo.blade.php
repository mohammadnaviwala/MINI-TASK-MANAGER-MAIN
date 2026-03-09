<svg {{ $attributes }} viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
  <!-- Outer gradient circle -->
  <circle cx="100" cy="100" r="90" fill="url(#gradOuter)" />

  <!-- Inner glassy circle -->
  <circle cx="100" cy="100" r="70" fill="white" fill-opacity="0.1" stroke="white" stroke-opacity="0.2" stroke-width="2"/>

  <!-- Centered Task card -->
  <rect x="60" y="55" width="80" height="90" rx="12" ry="12" fill="white" fill-opacity="0.9" />

  <!-- Checkmark -->
  <path d="M78 95 L90 108 L118 78" stroke="#22c55e" stroke-width="6" fill="none" stroke-linecap="round">
    <animate attributeName="stroke-dasharray" from="0,40" to="40,0" dur="1s" fill="freeze"/>
  </path>

  <!-- Gradient -->
  <defs>
    <linearGradient id="gradOuter" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" style="stop-color:#667eea; stop-opacity:1"/>
      <stop offset="50%" style="stop-color:#764ba2; stop-opacity:1"/>
      <stop offset="100%" style="stop-color:#6dd5ed; stop-opacity:1"/>
    </linearGradient>
  </defs>
</svg>