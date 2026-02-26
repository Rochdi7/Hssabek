"use client";

import React, { useState } from "react";
import { Card, Dropdown } from "react-bootstrap";
import OneDay from "./OneDay";
import FiveDay from "./FiveDay";
import OneMonth from "./OneMonth";
import SixMonth from "./SixMonth";
import OneYear from "./OneYear";

const EthereumRate = () => {
  // activeTab
  const [activeTab, setActiveTab] = useState(0);

  const handleTabClick = (index) => {
    setActiveTab(index);
  };

  return (
    <>
      <Card className="bg-white border-0 p-4 mb-4 rounded-10">
        <div className="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-1">
          <span className="d-block mb-1">Ethereum Rate</span>

          <Dropdown className="action-opt text-center">
            <Dropdown.Toggle className="btn bg-transparent p-0">
              <i className="ri-more-2-fill"></i>
            </Dropdown.Toggle>

            <Dropdown.Menu className="bg-white border-0 box-shadow">
              <Dropdown.Item>
                <i className="ri-edit-box-line"></i>
                Edit
              </Dropdown.Item>
              <Dropdown.Item>
                <i className="ri-eye-line"></i>
                View
              </Dropdown.Item>
              <Dropdown.Item>
                <i className="ri-delete-bin-6-line"></i>
                Delete
              </Dropdown.Item>
            </Dropdown.Menu>
          </Dropdown>
        </div>

        <div className="d-flex align-items-center mb-2">
          <h3 className="fs-32 fw-bold text-secondary mb-0">$1,528</h3>
          <span className="fw-medium fs-12 text-success bg-success bg-opacity-10 border border-success px-2 rounded-pill ms-2">
            +5.4%
            <i className="ri-arrow-up-line"></i>
          </span>
        </div>

        <span className="fs-12 d-block mb-4">Vs previous 30 days</span>

        <ul className="nav nav-tabs justify-content-between ethereum-rate-tabs">
          <li className="nav-item">
            <button
              onClick={() => handleTabClick(0)}
              className={`nav-link ${activeTab === 0 ? "active" : ""}`}
            >
              1D
            </button>
          </li>
          <li className="nav-item">
            <button
              onClick={() => handleTabClick(1)}
              className={`nav-link ${activeTab === 1 ? "active" : ""}`}
            >
              5D
            </button>
          </li>
          <li className="nav-item">
            <button
              onClick={() => handleTabClick(2)}
              className={`nav-link ${activeTab === 2 ? "active" : ""}`}
            >
              1M
            </button>
          </li>
          <li className="nav-item">
            <button
              onClick={() => handleTabClick(3)}
              className={`nav-link ${activeTab === 3 ? "active" : ""}`}
            >
              6M
            </button>
          </li>
          <li className="nav-item">
            <button
              onClick={() => handleTabClick(4)}
              className={`nav-link ${activeTab === 4 ? "active" : ""}`}
            >
              1Y
            </button>
          </li>
        </ul>

        <div className="tab-content">
          {activeTab === 0 && <OneDay />}
          {activeTab === 1 && <FiveDay />}
          {activeTab === 2 && <OneMonth />}
          {activeTab === 3 && <SixMonth />}
          {activeTab === 4 && <OneYear />}
        </div>
      </Card>
    </>
  );
};

export default EthereumRate;
