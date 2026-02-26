"use client";

import { Dropdown, Card, Table } from "react-bootstrap";
import Image from "next/image";
import WorldMapContent from "./WorldMapContent";
import { useState } from "react";

const SalesByLocations = () => {
  // Dynamic data for sales by country
  const [locationsData, setLocationsData] = useState([
    {
      country: "USA",
      countryCode: "us",
      orders: 22124,
      earnings: "$250.4k",
      flag: "/images/usa.svg",
    },
    {
      country: "Germany",
      countryCode: "de",
      orders: 18320,
      earnings: "$180.3k",
      flag: "/images/germany.svg",
    },
    {
      country: "United Kingdom",
      countryCode: "gb",
      orders: 12560,
      earnings: "$125.6k",
      flag: "/images/united-kingdom.svg",
    },
    {
      country: "Canada",
      countryCode: "ca",
      orders: 8720,
      earnings: "$94.1k",
      flag: "/images/canada.svg",
    },
  ]);

  // Prepare data for the WorldMap component
  const worldMapData = locationsData.map((location) => ({
    country: location.countryCode,
    value: location.orders,
  }));

  return (
    <>
      <Card className="bg-white border rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-4">
            <h3 className="mb-0">Sales by Locations</h3>

            <Dropdown className="action-opt">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="bg-transparent p-0"
              >
                <span className="material-symbols-outlined fs-20">
                  more_vert
                </span>
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item href="#">
                  <span className="material-symbols-outlined fs-16">
                    schedule
                  </span>
                  Today
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  <span className="material-symbols-outlined fs-16">
                    pie_chart
                  </span>
                  Last 7 Days
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  <span className="material-symbols-outlined fs-16">
                    refresh
                  </span>
                  Last Month
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  <span className="material-symbols-outlined fs-16">
                    calendar_month
                  </span>
                  Last 1 Year
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  <span className="material-symbols-outlined fs-16">
                    bar_chart
                  </span>
                  All Time
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  <span className="material-symbols-outlined fs-16">
                    visibility
                  </span>
                  View
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  <span className="material-symbols-outlined fs-16">
                    delete
                  </span>
                  Delete
                </Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>

          {/* Dynamic World Map */}
          <WorldMapContent data={worldMapData} />

          <div className="default-table-area style-two sales-locations-table">
            <div className="table-responsive">
              <Table className="align-middle border-0">
                <thead>
                  <tr className="border-bottom">
                    <th scope="col" className="bg-transparent pt-0">
                      Country
                    </th>
                    <th scope="col" className="text-end bg-transparent pt-0">
                      Orders
                    </th>
                    <th scope="col" className="text-end bg-transparent pt-0">
                      Earnings
                    </th>
                  </tr>
                </thead>
                <tbody>
                  {locationsData.map((location, index) => (
                    <tr key={index} className="tr-lcbp-none">
                      <td className="text-end fw-medium ps-0">
                        <div className="d-flex">
                          <Image
                            src={location.flag}
                            className="rounded-circle"
                            alt={location.country}
                            width={20}
                            height={20}
                          />
                          <span className="ps-2 fw-medium">
                            {location.country}
                          </span>
                        </div>
                      </td>
                      <td className="text-end fw-medium">
                        {location.orders.toLocaleString()}
                      </td>
                      <td className="text-end fw-medium">
                        {location.earnings}
                      </td>
                    </tr>
                  ))}
                </tbody>
              </Table>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default SalesByLocations;
