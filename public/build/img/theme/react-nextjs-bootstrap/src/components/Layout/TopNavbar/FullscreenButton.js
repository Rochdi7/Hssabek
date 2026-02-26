"use client";

import React, { useState } from "react"; 

const FullscreenButton = () => {
  const [isFullscreen, setIsFullscreen] = useState(false);

  const handleToggleFullscreen = () => {
    if (!document.fullscreenElement) {
      document.documentElement.requestFullscreen().then(() => {
        setIsFullscreen(true);
      }).catch(err => {
        console.error(`Error attempting to enable full-screen mode: ${err.message} (${err.name})`);
      });
    } else {
      document.exitFullscreen().then(() => {
        setIsFullscreen(false);
      }).catch(err => {
        console.error(`Error attempting to disable full-screen mode: ${err.message} (${err.name})`);
      });
    }
  };

  return (
    <>
      <button 
        variant="text" 
        className="fullscreen-btn bg-transparent p-0 border-0"
        onClick={handleToggleFullscreen}
      > 
        <i className="material-symbols-outlined fs-24 text-body">fullscreen</i>
      </button>
    </>
  );
};

export default FullscreenButton;
