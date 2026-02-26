"use client";

import { Card, Dropdown } from "react-bootstrap";
import Image from "next/image";

const TopProperty = () => {
  const properties = [
    {
      type: "Industrial",
      address: "36 Clay Street Indianapolis",
      image: "/images/property-1.png",
    },
    {
      type: "Office",
      address: "07 Maple Street Los Angeles",
      image: "/images/property-2.png",
    },
    {
      type: "Multi-Family",
      address: "94 Brooke Street Houston",
      image: "/images/property-3.png",
    },
    {
      type: "Retail",
      address: "84 Pick Street Centennial",
      image: "/images/property-4.png",
    },
  ];

  return (
    <Card className="bg-white border-0 rounded-3 mb-4">
      <Card.Body className="p-4">
        <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-4">
          <h3 className="mb-0">Top Property</h3>

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

        {properties.map((property, index) => (
          <div className="d-flex align-items-center mb-4 lcbmp-none" key={index}>
            <div className="flex-shrink-0">
              <Image
                src={property.image}
                className="rounded-3"
                alt={property.type.toLowerCase()}
                width={40}
                height={40}
              />
            </div>
            <div className="flex-grow-1 ms-2">
              <h4 className="fs-16 mb-0">{property.type}</h4>
              <span>{property.address}</span>
            </div>
          </div>
        ))}
      </Card.Body>
    </Card>
  );
};

export default TopProperty;
