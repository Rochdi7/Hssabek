"use client";

import React, { useState } from "react";
import { Card } from "react-bootstrap";
import AllNft from "./AllNft";
import InAuctionNft from "./InAuctionNft";
import SoldNft from "./SoldNft";

const NftsTabs = () => {
  // activeTab
  const [activeTab, setActiveTab] = useState(0);

  const handleTabClick = (index) => {
    setActiveTab(index);
  };

  return (
    <>
      <Card className="border-0 rounded-3 p-4 bg-white mb-4">
        <Card.Body className="p-0">
          <h3 className="mb-4">Angela’s NFTs</h3>

          <ul className="nav nav-tabs bg-transparent border-bottom gap-3 gap-sm-5 pb-4 live-auction">
            <li className="nav-item">
              <button
                onClick={() => handleTabClick(0)}
                className={`nav-link p-0 bg-transparent border-0 fs-12 fw-medium text-body ${
                  activeTab === 0 ? "active" : ""
                }`}
              >
                ALL
              </button>
            </li>

            <li className="nav-item">
              <button
                onClick={() => handleTabClick(1)}
                className={`nav-link p-0 bg-transparent border-0 fs-12 fw-medium text-body ${
                  activeTab === 1 ? "active" : ""
                }`}
              >
                IN AUCTION
              </button>
            </li>
            
            <li className="nav-item">
              <button
                onClick={() => handleTabClick(2)}
                className={`nav-link p-0 bg-transparent border-0 fs-12 fw-medium text-body ${
                  activeTab === 2 ? "active" : ""
                }`}
              >
                SOLD
              </button>
            </li>
          </ul>

          <div className="tab-content">
            {activeTab === 0 && <AllNft />}
            {activeTab === 1 && <InAuctionNft />}
            {activeTab === 2 && <SoldNft />}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default NftsTabs;
