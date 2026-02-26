"use client";

import React, { useState } from "react";
import { Card } from "react-bootstrap";
import PlaceBids from "./PlaceBids";
import AdditionalInformation from "./AdditionalInformation";
import Details from "./Details";

const ProductDescription = () => {
  // activeTab
  const [activeTab, setActiveTab] = useState(0);

  const handleTabClick = (index) => {
    setActiveTab(index);
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3">
        <Card.Body className="p-0">
          <h3 className="mb-4">Product Description</h3>

          <ul className="nav nav-tabs bg-transparent border-bottom gap-3 gap-sm-5 pb-3 live-auction">
            <li className="nav-item">
              <button
                onClick={() => handleTabClick(0)}
                className={`nav-link fs-12 fw-medium text-body bg-transparent border-0 ${
                  activeTab === 0 ? "active" : ""
                }`}
              >
                PLACE BIDS
              </button>
            </li>
            <li className="nav-item">
              <button
                onClick={() => handleTabClick(1)}
                className={`nav-link fs-12 fw-medium text-body bg-transparent border-0 ${
                  activeTab === 1 ? "active" : ""
                }`}
              >
                ADDITIONAL INFORMATION
              </button>
            </li>
            <li className="nav-item">
              <button
                onClick={() => handleTabClick(2)}
                className={`nav-link fs-12 fw-medium text-body bg-transparent border-0 ${
                  activeTab === 2 ? "active" : ""
                }`}
              >
                DETAILS
              </button>
            </li>
          </ul>

          <div className="tab-content">
            {activeTab === 0 && <PlaceBids />}
            {activeTab === 1 && <AdditionalInformation />}
            {activeTab === 2 && <Details />}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default ProductDescription;
