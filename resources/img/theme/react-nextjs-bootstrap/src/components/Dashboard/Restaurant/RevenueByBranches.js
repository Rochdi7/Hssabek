"use client";

import React, { useEffect, useState } from "react";
import Image from "next/image";
import WorldMap from "react-svg-worldmap";
import { Card, Dropdown } from "react-bootstrap";

const RevenueByBranches = () => {
  const [branches, setBranches] = useState([]);

  const data = [
    { country: "cn", value: 1389618778 }, // china
    { country: "in", value: 1311559204 }, // india
    { country: "us", value: 331883986 }, // united states
    { country: "id", value: 264935824 }, // indonesia
    { country: "pk", value: 210797836 }, // pakistan
    { country: "br", value: 210301591 }, // brazil
    { country: "ng", value: 208679114 }, // nigeria
    { country: "bd", value: 161062905 }, // bangladesh
    { country: "ru", value: 141944641 }, // russia
    { country: "mx", value: 127318112 }, // mexico
    { country: "jp", value: 125960000 }, // Japan
    { country: "au", value: 25687041 }, // Australia
    { country: "de", value: 83129285 }, // Germany
  ];

  useEffect(() => {
    // Simulate an API call or data fetch
    const mockBranches = [
      {
        id: 1,
        name: "United States",
        image: "/images/united-states-3.png",
        progress: 85,
        color: "#757DFF",
      },
      {
        id: 2,
        name: "Japan",
        image: "/images/japan.png",
        progress: 65,
        color: "#0F79F3",
      },
      {
        id: 3,
        name: "Australia",
        image: "/images/australia-2.png",
        progress: 45,
        color: "#9135E8",
      },
      {
        id: 4,
        name: "Germany",
        image: "/images/germany-2.png",
        progress: 75,
        color: "#25B003",
      },
    ];

    setBranches(mockBranches);
  }, []);

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
            <h3 className="mb-0 text-text-secondary-50">Revenue By Branches</h3>

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

          <div className="text-center" style={{ margin: "44px 0" }}>
            <WorldMap
              backgroundColor="transparent"
              color="blue"
              value-suffix="people"
              size="sm"
              data={data}
            />
          </div>

          <ul className="ps-0 mb-0 list-unstyled">
            {branches.map((branch) => (
              <li
                key={branch.id}
                className="mb-3 pb-3 border-bottom lcbmp-none"
              >
                <div className="d-flex align-items-center flex-wrap justify-content-between">
                  <div className="flex-shrink-0">
                    <div className="d-flex align-items-center">
                      <Image
                        src={branch.image}
                        alt={branch.name}
                        width={24}
                        height={24}
                      />
                      <div className="ms-3">
                        <h4 className="mb-0 fs-14 fw-medium lh-1">
                          {branch.name}
                        </h4>
                      </div>
                    </div>
                  </div>
                  <div className="flex-grow-1 ms-3">
                    <div className="d-flex align-items-center justify-content-end">
                      <div
                        className="progress-responsive"
                        style={{ width: "120px" }}
                      >
                        <div
                          className="progress rounded-pill"
                          style={{
                            height: "6px",
                            backgroundColor: "#ECF0FF",
                          }}
                        >
                          <div
                            className="progress-bar rounded-pill"
                            style={{
                              width: `${branch.progress}%`,
                              height: "6px",
                              backgroundColor: branch.color,
                            }}
                          ></div>
                        </div>
                      </div>
                      <span className="count text-body ms-3 fs-14 fw-medium">
                        {branch.progress}%
                      </span>
                    </div>
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

export default RevenueByBranches;
