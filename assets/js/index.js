document.documentElement.classList.remove("no-js");

// Dark Mode
const STORAGE_KEY = "theme";
const COLOR_MODE_KEY = "--color-mode";

const modeToggleButton = document.querySelector(".js-mode-toggle");
const modeToggleText = document.querySelector(".js-mode-toggle-text");
const modeStatusElement = document.querySelector(".js-mode-status");

const getCSSCustomProp = (propKey) => {
  let response = getComputedStyle(document.documentElement).getPropertyValue(
    propKey
  );

  if (response.length) {
    response = response.replace(/\"/g, "").trim();
  }

  return response;
};

const applySetting = (passedSetting) => {
  let currentSetting = passedSetting || localStorage.getItem(STORAGE_KEY);

  if (currentSetting) {
    document.documentElement.setAttribute("data-theme", currentSetting);
    setButtonLabelAndStatus(currentSetting);
  } else {
    setButtonLabelAndStatus(getCSSCustomProp(COLOR_MODE_KEY));
  }
};

const setButtonLabelAndStatus = (currentSetting) => {
  modeToggleText.innerText = `Enable ${
    currentSetting === "dark" ? "light" : "dark"
  } mode`;
  modeStatusElement.innerText = `Color mode is now "${currentSetting}"`;
};

const toggleSetting = () => {
  let currentSetting = localStorage.getItem(STORAGE_KEY);

  switch (currentSetting) {
    case null:
      currentSetting =
        getCSSCustomProp(COLOR_MODE_KEY) === "dark" ? "light" : "dark";
      break;
    case "light":
      currentSetting = "dark";
      break;
    case "dark":
      currentSetting = "light";
      break;
  }

  localStorage.setItem(STORAGE_KEY, currentSetting);

  return currentSetting;
};

modeToggleButton.addEventListener("click", (evt) => {
  evt.preventDefault();

  applySetting(toggleSetting());
});

applySetting();

// Menu Toggle
const menu = document.getElementById("menu");
const toggle = document.getElementById("menu-toggle");
const pressedClass = "menu-toggle--is-pressed";
const visibleClass = "site-menu--is-visible";

toggle.addEventListener("click", function () {
  if (menu.classList.contains(visibleClass)) {
    toggle.classList.remove(pressedClass);
    menu.classList.remove(visibleClass);
  } else {
    toggle.classList.add(pressedClass);
    menu.classList.add(visibleClass);
  }
});
