"use client";

import React, { useState, useEffect } from "react";

const DarkMode = () => {
  // Light/Dark Mode
  const [isDarkMode, setIsDarkMode] = useState(false);

  useEffect(() => {
    // Retrieve the user's preference from local storage
    const storedPreference = localStorage.getItem("theme");
    if (storedPreference === "dark") {
      setIsDarkMode(true);
    }
  }, []);

  const handleToggle = () => {
    setIsDarkMode(!isDarkMode);
  };

  useEffect(() => {
    // Update the user's preference in local storage
    localStorage.setItem("theme", isDarkMode ? "dark" : "light");

    // Update the class on the <html> element to apply the selected mode
    const htmlElement = document.querySelector("html");
    if (isDarkMode) {
      htmlElement.classList.add("dark");
    } else {
      htmlElement.classList.remove("dark");
    }
  }, [isDarkMode]);

  return (
    <>
      <div className="light-dark">
        <button
          className="switch-toggle settings-btn dark-btn p-0 bg-transparent border-0"
          onClick={handleToggle}
        >
          <span>
            <i className="material-symbols-outlined">light_mode</i>
          </span>
          <span className="light">
            <i className="material-symbols-outlined">dark_mode</i>
          </span>
        </button>
      </div>
    </>
  );
};

export default DarkMode;
