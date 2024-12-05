// ------------------------upload img----------------------------
const fileInput = document.getElementById("file-input");
const previewImage = document.getElementById("preview-image");

fileInput.addEventListener("change", (event) => {
  const file = event.target.files[0];

  if (file && file.type.startsWith("image/")) {
    const reader = new FileReader();

    reader.onload = (e) => {
      previewImage.src = e.target.result; // Set image source
      previewImage.style.display = "block"; // Show the image
    };

    reader.readAsDataURL(file); // Start reading file
  } else {
    alert("File yang dipilih bukan gambar. Harap unggah gambar.");
  }
});