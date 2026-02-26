"use client";

import React, { useState } from "react";
import { Card } from "react-bootstrap";
import AllCampaigns from "./AllCampaigns";
import PendingCampaigns from "./PendingCampaigns";
import CompletedCampaigns from "./CompletedCampaigns";
import AddCampaignsModal from "./AddCampaignsModal";

const Campaigns = () => {
  const [activeTab, setActiveTab] = useState(0);

  const handleTabClick = (index) => {
    setActiveTab(index);
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3">
            <h3 className="mb-0">Campaigns</h3>

            <AddCampaignsModal />
          </div>

          <div>
            <ul className="nav nav-tabs bg-transparent border-bottom gap-2 gap-sm-5 pb-4">
              <li className="nav-item">
                <button
                  onClick={() => handleTabClick(0)}
                  className={`nav-link p-0 bg-transparent border-0 fs-12 fw-medium ${
                    activeTab === 0 ? "text-primary" : "text-body"
                  }`}
                >
                  ALL
                </button>
              </li>

              <li className="nav-item">
                <button
                  onClick={() => handleTabClick(1)}
                  className={`nav-link p-0 bg-transparent border-0 fs-12 fw-medium ${
                    activeTab === 1 ? "text-primary" : "text-body"
                  }`}
                >
                  PENDING
                </button>
              </li>

              <li className="nav-item">
                <button
                  onClick={() => handleTabClick(2)}
                  className={`nav-link p-0 bg-transparent border-0 fs-12 fw-medium ${
                    activeTab === 2 ? "text-primary" : "text-body"
                  }`}
                >
                  COMPLETED
                </button>
              </li>
            </ul>

            <div className="tab-content">
              {activeTab === 0 && <AllCampaigns />}
              {activeTab === 1 && (
                <PendingCampaigns />
              )}
              {activeTab === 2 && (
                <CompletedCampaigns />
              )}
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default Campaigns;
