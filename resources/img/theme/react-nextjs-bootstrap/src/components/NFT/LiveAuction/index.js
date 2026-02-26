"use client";

import React, { useState } from "react";
import { Card } from "react-bootstrap";
import AllTime from "./AllTime";
import UpTo15 from "./UpTo15";
import UpTo30 from "./UpTo30";
import UpTo50 from "./UpTo50";

const LiveAuction = () => {
  // activeTab
  const [activeTab, setActiveTab] = useState(0);

  const handleTabClick = (index) => {
    setActiveTab(index);
  };

  return (
    <>
      <Card className="border-0 bg-white p-4 mb-4">
        <div className="d-flex flex-wrap gap-2 justify-content-between align-items-center">
          <h3 className="mb-0 fs-18">Live Auction</h3>

          <ul className="nav nav-tabs live-auction gap-2 gap-md-4 border-0 bg-transparent">
            <li className="nav-item">
              <button
                onClick={() => handleTabClick(0)}
                className={`nav-link fs-12 fw-medium text-body bg-transparent border-0 ${
                  activeTab === 0 ? "active" : ""
                }`}
              >
                ALL ITEMS
              </button>
            </li>
            <li className="nav-item">
              <button
                onClick={() => handleTabClick(1)}
                className={`nav-link fs-12 fw-medium text-body bg-transparent border-0 ${
                  activeTab === 1 ? "active" : ""
                }`}
              >
                UP TO 15%
              </button>
            </li>
            <li className="nav-item">
              <button
                onClick={() => handleTabClick(2)}
                className={`nav-link fs-12 fw-medium text-body bg-transparent border-0 ${
                  activeTab === 2 ? "active" : ""
                }`}
              >
                UP TO 30%
              </button>
            </li>
            <li className="nav-item">
              <button
                onClick={() => handleTabClick(3)}
                className={`nav-link fs-12 fw-medium text-body bg-transparent border-0 ${
                  activeTab === 3 ? "active" : ""
                }`}
              >
                UP TO 50%
              </button>
            </li>
          </ul>
        </div>
      </Card>
      
      <div className="tab-content">
        {activeTab === 0 && <AllTime />}
        {activeTab === 1 && <UpTo15 />}
        {activeTab === 2 && <UpTo30 />}
        {activeTab === 3 && <UpTo50 />}
      </div>
    </>
  );
};

export default LiveAuction;
