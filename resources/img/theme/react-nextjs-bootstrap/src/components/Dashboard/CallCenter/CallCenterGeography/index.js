"use client";

import { Card, Dropdown, ProgressBar } from "react-bootstrap";
import Image from "next/image";
import { useState, useEffect } from "react";
import WorldMapContent from "./WorldMapContent";

const CallCenterGeography = () => {
  const [timeRange, setTimeRange] = useState("Last Month");
  const [locationsData, setLocationsData] = useState([]);

  // Simulate dynamic data fetching
  useEffect(() => {
    const fetchData = async () => {
      // Replace with your API call or dynamic data logic
      const data = [
        {
          country: "United States",
          calls: 1200,
          satisfaction: 90,
          image: "/images/usa.svg",
          progressBarVariant: "success",
        },
        {
          country: "Canada",
          calls: 980,
          satisfaction: 80,
          image: "/images/canada.svg",
          progressBarVariant: "info",
        },
        {
          country: "Brazil",
          calls: 850,
          satisfaction: 65,
          image: "/images/brazil.svg",
          progressBarVariant: "warning",
        },
        {
          country: "Russia",
          calls: 750,
          satisfaction: 60,
          image: "/images/russia.png",
          progressBarVariant: "success",
        },
        {
          country: "Germany",
          calls: 450,
          satisfaction: 40,
          image: "/images/germany.svg",
          progressBarVariant: "danger",
        },
      ];

      setLocationsData(data);
    };

    fetchData();
  }, [timeRange]); // Re-fetch data if timeRange changes

  return (
    <>
      <Card className="rounded-3 bg-white border-0 mb-4">
        <div className="custom-padding-30">
          <div className="d-flex justify-content-between align-items-start mb-3">
            <h3 className="mb-0 fw-semibold">Call Center Geography</h3>

            <Dropdown className="action-opt" align="end">
              <Dropdown.Toggle
                variant="link"
                className="text-decoration-none bg-transparent p-0 d-flex align-items-center text-body"
                id="dropdown-basic"
              >
                <span className="fs-14 lh-1">{timeRange}</span>{" "}
                <i className="ri-arrow-down-s-line fs-20"></i>
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                {["Last Day", "Last Week", "Last Month", "Last Year"].map(
                  (range) => (
                    <Dropdown.Item
                      key={range}
                      className="px-3 py-2 text-start"
                      onClick={() => setTimeRange(range)}
                    >
                      {range}
                    </Dropdown.Item>
                  )
                )}
              </Dropdown.Menu>
            </Dropdown>
          </div>

          <div style={{ marginBottom: "30px" }}>
            <WorldMapContent />
          </div>

          <ul className="ps-0 mb-0 list-unstyled sales_by_locations mt-4">
            {locationsData.map((location, index) => (
              <li className="d-flex align-items-center pe-0" key={index}>
                <div className="flex-shrink-0">
                  <Image
                    src={location.image}
                    className="rounded-circle"
                    alt={location.country}
                    width={30}
                    height={30}
                  />
                </div>
                <div className="flex-grow-1 ms-3">
                  <div className="d-flex justify-content-between gap-1">
                    <span className="fw-medium">{location.country}</span>
                    <span>{location.calls} calls</span>
                    <span className="fw-medium text-body">
                      {location.satisfaction}%
                    </span>
                  </div>
                  <div className="mt-1">
                    <ProgressBar
                      variant={location.progressBarVariant}
                      now={location.satisfaction}
                      style={{ height: "5px" }}
                    />
                  </div>
                </div>
              </li>
            ))}
          </ul>
        </div>
      </Card>
    </>
  );
};

export default CallCenterGeography;
