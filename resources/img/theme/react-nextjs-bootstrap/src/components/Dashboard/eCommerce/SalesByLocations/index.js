"use client";

import { Dropdown, Card, ProgressBar } from "react-bootstrap";
import Image from "next/image";
import WorldMapContent from "./WorldMapContent";

const salesData = [
  {
    name: "United States",
    salesPercentage: 85,
    flag: "/images/usa.svg",
  },
  {
    name: "Germany",
    salesPercentage: 75,
    flag: "/images/germany.svg",
  },
  {
    name: "United Kingdom",
    salesPercentage: 40,
    flag: "/images/united-kingdom.svg",
  },
  {
    name: "Canada",
    salesPercentage: 10,
    flag: "/images/canada.svg",
  },
  {
    name: "Portugal",
    salesPercentage: 5,
    flag: "/images/portugal.svg",
  },
  {
    name: "Spain",
    salesPercentage: 15,
    flag: "/images/spain.svg",
  },
];

const SalesByLocations = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-4">
            <h3 className="mb-0">Sales by Locations</h3>

            <Dropdown className="action-opt">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="bg-transparent p-0"
              >
                <i className="material-symbols-outlined">more_horiz</i>
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">schedule</i>
                  Today
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">pie_chart</i>
                  Last 7 Days
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">refresh</i>
                  Last Month
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">calendar_today</i>
                  Last 1 Year
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">bar_chart</i>
                  All Time
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">visibility</i>
                  View
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">delete</i>
                  Delete
                </Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>

          <WorldMapContent />

          <ul className="ps-0 mb-0 list-unstyled sales_by_locations">
            {salesData.map((location, index) => (
              <li key={index} className="d-flex align-items-center">
                <div className="flex-shrink-0">
                  <Image
                    src={location.flag}
                    className="rounded-circle"
                    alt={location.name}
                    width={30}
                    height={30}
                  />
                </div>
                <div className="flex-grow-1 ms-3">
                  <span className="fw-medium d-block mb-2">
                    {location.name}
                  </span>

                  <div>
                    <ProgressBar now={location.salesPercentage} />
                    <span className="count fw-medium text-body">
                      {location.salesPercentage}%
                    </span>
                  </div>
                </div>
              </li>
            ))}
          </ul>
        </Card.Body>
      </Card>
    </>
  );
};

export default SalesByLocations;
