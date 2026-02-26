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
];

const EnrolledByCountries = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-4">
            <h3 className="mb-0">Enrolled by Countries</h3>

            <Dropdown className="action-opt">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="bg-transparent p-0"
              >
                <span className="material-symbols-outlined">more_horiz</span>
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item href="#">
                  <span className="material-symbols-outlined">schedule</span>
                  Today
                </Dropdown.Item>

                <Dropdown.Item href="#">
                  <span className="material-symbols-outlined">pie_chart</span>
                  Last 7 Days
                </Dropdown.Item>

                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">refresh</i>
                  Last Month
                </Dropdown.Item>

                <Dropdown.Item href="#">
                  <span className="material-symbols-outlined">
                    calendar_today
                  </span>
                  Last 1 Year
                </Dropdown.Item>

                <Dropdown.Item href="#">
                  <span className="material-symbols-outlined">bar_chart</span>
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
          
          <div style={{ margin: '30px 0' }}>
            <WorldMapContent />
          </div>

          <ul className="ps-0 mb-0 list-unstyled sales_by_locations mb-29">
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

export default EnrolledByCountries;
