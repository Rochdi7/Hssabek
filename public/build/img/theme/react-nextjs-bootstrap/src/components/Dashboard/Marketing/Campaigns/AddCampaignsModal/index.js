"use client";

import React, { useState } from "react";
import { Button } from "react-bootstrap";
import CampaignDetails from "./CampaignDetails";
import CreativeUploads from "./CreativeUploads";
import Audiences from "./Audiences";
import BudgetEstimates from "./BudgetEstimates";
import Completed from "./Completed";
import ViewCampaign from "./ViewCampaign";

const AddCampaignsModal = () => {
  // Modal
  const [isShowModal, setShowModal] = useState(true);
  const handleToggleShowModal = () => {
    setShowModal(!isShowModal);
  };

  // activeTab
  const [activeTab, setActiveTab] = useState(0);

  const handleTabClick = (index) => {
    setActiveTab(index);
  };

  const handleNext = () => {
    if (activeTab < 5) setActiveTab((prev) => prev + 1);
  };

  const handleBack = () => {
    if (activeTab > 0) setActiveTab((prev) => prev - 1);
  };

  return (
    <>
      <button
        className="btn btn-outline-primary py-1 px-2 px-sm-4 fs-14 fw-medium rounded-3 hover-bg"
        onClick={handleToggleShowModal}
      >
        <span className="py-sm-1 d-block">
          <i className="ri-add-line d-none d-sm-inline-block"></i>
          <span>Add Campaigns</span>
        </span>
      </button>

      {/* Modal */}
      <div
        className={`custom-modal center p-lg-5 ${isShowModal ? "" : "show"}`}
      >
        <div className="custom-modal-content position-relative z-3 w-100">
          <div
            className="custom-modal-header border-0 p-4 p-md-5 pb-0 d-flex align-items-center justify-content-between position-sticky z-3"
            style={{ top: "0" }}
          >
            <h3 className="fs-24 mb-0">Create Campaigns</h3>

            <div className="close-link" onClick={handleToggleShowModal}>
              <span className="material-symbols-outlined">close</span>
            </div>
          </div>

          <div className="p-4 p-md-5">
            <ul className="tabs create-campaigns-tabs d-flex flex-wrap justify-content-between gap-2 list-unstyled pb-0">
              <li className={`tab ${activeTab === 0 ? "active" : ""}`}>
                <button
                  onClick={() => handleTabClick(0)}
                  className="nav-link fs-12 fw-medium text-secondary border-0"
                >
                  CAMPAIGN DETAILS
                </button>
              </li>
              <li className={`tab ${activeTab === 1 ? "active" : ""}`}>
                <button
                  onClick={() => handleTabClick(1)}
                  className="nav-link fs-12 fw-medium text-secondary border-0"
                >
                  CREATIVE UPLOADS
                </button>
              </li>
              <li className={`tab ${activeTab === 2 ? "active" : ""}`}>
                <button
                  onClick={() => handleTabClick(2)}
                  className="nav-link fs-12 fw-medium text-secondary border-0"
                >
                  AUDIENCES
                </button>
              </li>
              <li className={`tab ${activeTab === 3 ? "active" : ""}`}>
                <button
                  onClick={() => handleTabClick(3)}
                  className="nav-link fs-12 fw-medium text-secondary border-0"
                >
                  BUDGET ESTIMATES
                </button>
              </li>
              <li className={`tab ${activeTab === 4 ? "active" : ""}`}>
                <button
                  onClick={() => handleTabClick(4)}
                  className="nav-link fs-12 fw-medium text-secondary border-0"
                >
                  COMPLETED
                </button>
              </li>
              <li className={`tab ${activeTab === 5 ? "active" : ""}`}>
                <button
                  onClick={() => handleTabClick(5)}
                  className="nav-link fs-12 fw-medium text-secondary border-0"
                >
                  VIEW CAMPAIGN
                </button>
              </li>
            </ul>

            <div className="tab-content">
              {activeTab === 0 && <CampaignDetails />}
              {activeTab === 1 && <CreativeUploads />}
              {activeTab === 2 && <Audiences />}
              {activeTab === 3 && <BudgetEstimates />}
              {activeTab === 4 && <Completed />}
              {activeTab === 5 && <ViewCampaign />}

              {/* Back & Continue Button */}
              <div
                className="buttons d-flex justify-content-between m-auto"
                style={{ maxWidth: "625px" }}
              >
                <Button
                  id="prevButton"
                  className="btn btn-secondary"
                  onClick={handleBack}
                  disabled={activeTab === 0}
                >
                  <i className="ri-arrow-left-line text-white"></i> Back
                </Button>
                <Button
                  id="nextButton"
                  className="btn btn-primary"
                  onClick={handleNext}
                  disabled={activeTab === 5}
                >
                  Continue <i className="ri-arrow-right-line text-white"></i>
                </Button>
              </div>
            </div>
          </div>
        </div>

        <div className="close-outside" onClick={handleToggleShowModal}></div>
      </div>
    </>
  );
};

export default AddCampaignsModal;
