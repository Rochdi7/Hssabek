"use client";

import React, { useState } from "react";
import { Button } from "react-bootstrap";
import RTLMode from "./RTLMode";
import DarkMode from "./DarkMode";
import TopNavbarDark from "./TopNavbarDark";
import LeftSidebarDark from "./LeftSidebarDark";
import CompactSidebar from "./CompactSidebar";
import HorizontalLayout from "./HorizontalLayout";

const ControlPanel = () => {
  const [isActiveControlPanel, setActiveControlPanel] = useState("false");
  const handleToggleControlPanel = () => {
    setActiveControlPanel(!isActiveControlPanel);
  };

  return (
    <>
      <Button
        variant="primary"
        className="theme-settings-btn p-0 border-0 bg-transparent"
        onClick={handleToggleControlPanel}
      >
        <i className="material-symbols-outlined text-24">settings</i>
      </Button>

      <div
        className={`settings-sidebar bg-white transition ${
          isActiveControlPanel ? "" : "active"
        }`}
      >
        <div className="settings-header bg-primary">
          <h4 className="text-white">Theme Settings</h4>
          <button
            className="close-btn text-white"
            type="button"
            onClick={handleToggleControlPanel}
          >
            <i className="ri-close-line"></i>
          </button>
        </div>

        <div className="settings-body">
          <RTLMode />

          <div className="border-bottom" style={{ margin: "15px 0" }}></div>

          <DarkMode />

          <div className="border-bottom" style={{ margin: "15px 0" }}></div>

          <HorizontalLayout />

          <div className="border-bottom" style={{ margin: "15px 0" }}></div>

          <CompactSidebar />

          <div className="border-bottom" style={{ margin: "15px 0" }}></div>

          <TopNavbarDark />

          <div className="border-bottom" style={{ margin: "15px 0" }}></div>

          <LeftSidebarDark />

          <div className="border-bottom" style={{ margin: "15px 0" }}></div>

          <a
            href="https://1.envato.market/QyqV6P"
            className="btn btn-primary px-3"
            target="_blank"
          >
            Buy Trezo
          </a>
        </div>
      </div>
    </>
  );
};

export default ControlPanel;
