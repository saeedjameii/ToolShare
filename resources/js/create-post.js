const form = document.getElementById("listing-form");
if (form) {
const title = document.getElementById("tool-title");
const description = document.getElementById("description");
const category = document.getElementById("category");
const condition = document.getElementById("condition");
const locationInput = document.getElementById("location");
const firstDay = document.getElementById("first-day-price");
const extraDay = document.getElementById("extra-day-price");
const startDate = document.getElementById("available-start");
const endDate = document.getElementById("available-end");
const photoInput = document.getElementById("tool-photos");
const thumbnailStrip = document.getElementById("thumbnail-strip");
const photoStatus = document.getElementById("photo-status");
const characterCount = document.getElementById("character-count");
const formStatus = document.getElementById("form-status");
const draftButton = document.getElementById("save-draft-button");

const previewTitle = document.getElementById("preview-title");
const previewCategory = document.getElementById("preview-category");
const previewMeta = document.getElementById("preview-meta");
const previewPrice = document.getElementById("preview-price");
const previewImage = document.getElementById("preview-image");
const toolIllustration = document.querySelector(".tool-illustration");

function currency(value){
  const n = Number(value);
  return Number.isFinite(n) && value !== "" ? "$" + n.toFixed(2).replace(".00","") : "$0";
}

function updatePreview(){
  previewTitle.textContent = title.value.trim() || "Your tool title";
  previewCategory.textContent = category.value || "Category";
  previewMeta.textContent = (condition.value || "Condition") + " · " + (locationInput.value.trim() || "Pickup location");
  previewPrice.textContent = currency(firstDay.value) + " first day · " + currency(extraDay.value) + " extra day";
}

function updateCharacterCount(){
  characterCount.textContent = description.value.length + " / 1000";
}

function showPhotoPreviews(files){
  thumbnailStrip.replaceChildren();
  const selected = Array.from(files).slice(0,5);

  if (selected.length) {
    const reader = new FileReader();
    reader.onload = event => {
      previewImage.src = event.target.result;
      previewImage.hidden = false;
      toolIllustration.hidden = true;
    };
    reader.readAsDataURL(selected[0]);
  } else {
    previewImage.removeAttribute("src");
    previewImage.hidden = true;
    toolIllustration.hidden = false;
  }

  selected.forEach(file=>{
    const thumb=document.createElement("div");
    thumb.className="local-thumb";
    const reader=new FileReader();
    reader.onload=e=>thumb.style.backgroundImage=`url("${e.target.result}")`;
    reader.readAsDataURL(file);
    thumbnailStrip.appendChild(thumb);
  });

  if(files.length>5) photoStatus.textContent="Showing the first 5 selected photos.";
  else if(selected.length) photoStatus.textContent=selected.length+" photo"+(selected.length===1?"":"s")+" selected for this preview.";
  else photoStatus.textContent="";
}

[title,category,condition,locationInput,firstDay,extraDay].forEach(input=>{
  input.addEventListener("input",updatePreview);
  input.addEventListener("change",updatePreview);
});

description.addEventListener("input",updateCharacterCount);
photoInput.addEventListener("change",()=>showPhotoPreviews(photoInput.files));

updateCharacterCount();
updatePreview();
}
