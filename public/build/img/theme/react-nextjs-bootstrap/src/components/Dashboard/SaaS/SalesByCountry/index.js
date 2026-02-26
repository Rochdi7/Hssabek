"use client";

import React, { useState } from "react";
import { Card, Dropdown, ProgressBar } from "react-bootstrap";
import Image from "next/image";
import WorldMapContent from "./WorldMapContent";

const SalesByCountry = () => {
  const [creatorData, setCreatorData] = useState([
    {
      id: 1,
      country: "United States",
      progress: 85,
      variant: "primary",
      image: "/images/united-states-3.png",
    },
    {
      id: 2,
      country: "Japan",
      progress: 65,
      variant: "secondary",
      image: "/images/japan.png",
    },
    {
      id: 3,
      country: "Australia",
      progress: 45,
      variant: "success",
      image: "/images/australia-2.png",
    },
    {
      id: 4,
      country: "Germany",
      progress: 75,
      variant: "warning",
      image: "/images/germany-2.png",
    },
    {
      id: 5,
      country: "Russia",
      progress: 35,
      variant: "danger",
      image: "/images/russia.png",
    },
  ]);

  return (
    <Card className="bg-white border-0 p-4 mb-4 rounded-10">
      <div className="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-1">
        <h3 className="mb-0">Sales By Country</h3>
        
        <Dropdown className="action-opt text-center">
          <Dropdown.Toggle className="btn bg-transparent p-0">
            <i className="ri-more-2-fill"></i>
          </Dropdown.Toggle>
          <Dropdown.Menu className="bg-white border-0 box-shadow">
            <Dropdown.Item>
              <i className="ri-pie-chart-line"></i> Today
            </Dropdown.Item>
            <Dropdown.Item>
              <i className="ri-restart-line"></i> Last 7 Days
            </Dropdown.Item>
            <Dropdown.Item>
              <i className="ri-restart-line"></i> Last Month
            </Dropdown.Item>
            <Dropdown.Item>
              <i className="ri-calendar-2-line"></i> Last 1 Year
            </Dropdown.Item>
            <Dropdown.Item>
              <i className="ri-eye-line"></i> View
            </Dropdown.Item>
            <Dropdown.Item>
              <i className="ri-delete-bin-6-line"></i> Delete
            </Dropdown.Item>
          </Dropdown.Menu>
        </Dropdown>
      </div>

      <WorldMapContent />

      <ul className="ps-0 mb-0 list-unstyled list-last-child">
        {creatorData.map((creator) => (
          <li key={creator.id} className="mb-3 pb-3 border-bottom">
            <div className="d-flex align-items-center justify-content-between">
              <div className="flex-shrink-0">
                <div className="d-flex align-items-center">
                  <Image src={creator.image} alt={creator.country} width={24} height={24} />
                  <div className="ms-3">
                    <h4 className="mb-0 fs-12 fw-semibold lh-1">{creator.country}</h4>
                  </div>
                </div>
              </div>
              <div className="flex-grow-1 ms-3">
                <div className="d-flex align-items-center justify-content-end">
                  <ProgressBar
                    now={creator.progress}
                    variant={creator.variant}
                    style={{
                      width: "90px",
                      height: "8px",
                      backgroundColor: "#ECF0FF",
                    }}
                  />
                  <span className="count text-body ms-3 fs-14 fw-medium">
                    {creator.progress}%
                  </span>
                </div>
              </div>
            </div>
          </li>
        ))}
      </ul>
    </Card>
  );
};

export default SalesByCountry;
