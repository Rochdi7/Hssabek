"use client";

import React, { useEffect, useState } from "react";
import Image from "next/image";
import { Card, Dropdown } from "react-bootstrap";

const StaffPerformanceScores = () => {
  const [staffPerformance, setStaffPerformance] = useState([]);

  useEffect(() => {
    // Simulate an API call or data fetch
    const mockStaffPerformance = [
      {
        id: 1,
        name: "Jonathon Ronan",
        score: 98,
        image: "/images/user-84.png",
      },
      { id: 2, name: "Angela Carter", score: 97, image: "/images/user-81.png" },
      { id: 3, name: "Walter White", score: 96, image: "/images/user-82.png" },
      { id: 4, name: "Gary Simon", score: 88, image: "/images/user-83.png" },
      {
        id: 5,
        name: "Zinia Anderson",
        score: 85,
        image: "/images/user-109.png",
      },
      { id: 6, name: "Loren Walter", score: 82, image: "/images/user-81.png" },
      {
        id: 7,
        name: "Jessy Pinkman",
        score: 80,
        image: "/images/user-135.png",
      },
      { id: 8, name: "Handy Curter", score: 77, image: "/images/user-139.png" },
      {
        id: 9,
        name: "Skyler Lorensa",
        score: 75,
        image: "/images/user-138.png",
      },
    ];

    setStaffPerformance(mockStaffPerformance);
  }, []);

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
            <h3 className="mb-0 text-text-secondary-50">
              Staff Performance Score
            </h3>

            <Dropdown className="action-opt">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="bg-transparent p-0"
              >
                <i className="ri-more-2-fill fs-20"></i>
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  This Day
                </Dropdown.Item>

                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  This Week
                </Dropdown.Item>

                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  This Month
                </Dropdown.Item>

                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  This Year
                </Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>

          <ul className="p-0 m-0 list-unstyled last-child-none">
            {staffPerformance.map((staff) => (
              <li
                key={staff.id}
                className="d-flex justify-content-between align-items-center border-bottom border-border-color-50 lcbmp-none"
                style={{
                  paddingBottom: "13.5px",
                  marginBottom: "13.5px",
                }}
              >
                <div
                  className="d-flex align-items-center"
                  style={{ gap: "8px" }}
                >
                  <Image
                    src={staff.image}
                    className="rounded-circle"
                    alt="user"
                    width={24}
                    height={24}
                  />
                  <h5 className="fs-14 fw-medium m-0">{staff.name}</h5>
                </div>
                <span className="fs-14 fw-medium">{staff.score}</span>
              </li>
            ))}
          </ul>
        </Card.Body>
      </Card>
    </>
  );
};

export default StaffPerformanceScores;
