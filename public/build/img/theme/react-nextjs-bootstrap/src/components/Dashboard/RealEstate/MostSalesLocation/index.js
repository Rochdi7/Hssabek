"use client";

import { Card, Dropdown, ProgressBar } from "react-bootstrap";
import Image from "next/image";
import WorldMapContent from "./WorldMapContent";

const MostSalesLocation = () => {
  const salesData = [
    {
      country: "United States",
      image: "/images/usa.svg",
      progress: 60,
      percentage: "85%",
      variant: "primary",
    },
    {
      country: "Germany",
      image: "/images/germany.svg",
      progress: 75,
      percentage: "75%",
      variant: "success",
    },
    {
      country: "United Kingdom",
      image: "/images/united-kingdom.svg",
      progress: 40,
      percentage: "40%",
      variant: "info",
    },
    {
      country: "Canada",
      image: "/images/canada.svg",
      progress: 10,
      percentage: "10%",
      variant: "secondary",
    },
    {
      country: "Portugal",
      image: "/images/portugal.svg",
      progress: 5,
      percentage: "5%",
      variant: "warning",
    },
    {
      country: "Spain",
      image: "/images/spain.svg",
      progress: 15,
      percentage: "15%",
      variant: "danger",
    },
  ];

  return (
    <Card className="bg-white border-0 p-4 mb-4 rounded-10">
      <div className="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-1">
        <h3 className="mb-0">Most Sales Location</h3>

        <Dropdown className="action-opt text-center">
          <Dropdown.Toggle className="btn bg-transparent p-0">
            <i className="ri-more-fill"></i>
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

      <ul className="ps-0 mb-0 list-unstyled sales_by_locations mt-4">
        {salesData.map((location, index) => (
          <li key={index} className="d-flex align-items-center">
            <div className="flex-shrink-0">
              <Image
                src={location.image}
                className="rounded-circle"
                alt={location.country.toLowerCase()}
                width={30}
                height={30}
              />
            </div>
            <div className="flex-grow-1 ms-3">
              <span className="fw-medium d-block mb-2">{location.country}</span>
              <div>
                <ProgressBar
                  variant={location.variant}
                  now={location.progress}
                />
                <span className="count fw-medium text-body">
                  {location.percentage}
                </span>
              </div>
            </div>
          </li>
        ))}
      </ul>
    </Card>
  );
};

export default MostSalesLocation;
