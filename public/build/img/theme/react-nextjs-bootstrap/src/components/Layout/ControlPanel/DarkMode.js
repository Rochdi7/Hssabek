"use client";

import React, { useState, useEffect } from "react";

const DarkMode = () => {
  // Light/Dark Mode state
  const [isDarkMode, setIsDarkMode] = useState(false);

  useEffect(() => {
    // Retrieve the user's preference from local storage
    const storedPreference = localStorage.getItem("theme");
    if (storedPreference === "dark") {
      setIsDarkMode(true);
      document.documentElement.classList.add("dark"); // Apply dark mode class on load
    }
  }, []);

  const handleToggle = () => {
    const newMode = !isDarkMode;
    setIsDarkMode(newMode);
    localStorage.setItem("theme", newMode ? "dark" : "light");

    // Apply/remove the "dark" class dynamically
    document.documentElement.classList.toggle("dark", newMode);
  };

  return (
    <>
      <span className="title">Light/Dark Mode</span>

      <button
        className="switch-btn light-dark-btn bg-transparent border-none"
        onClick={handleToggle}
      >
        <div className="first">
          <div className="box">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
          </div>
          <div className="sub-title">
            <div className="dot-checkbox"></div>
            <span style={{ display: "block", fontWeight: "600" }}>Light</span>
          </div>
        </div>

        <div className="second">
          <div className="box">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
          </div>
          <div className="sub-title">
            <div className="dot-checkbox"></div>
            <span style={{ display: "block", fontWeight: "600" }}>Dark</span>
          </div>
        </div>
      </button>
    </>
  );
};

export default DarkMode;
