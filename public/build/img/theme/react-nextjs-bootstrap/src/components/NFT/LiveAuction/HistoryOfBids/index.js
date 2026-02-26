"use client";

import React, { useState } from "react";
import { Card, Dropdown, Button } from "react-bootstrap";
import Image from "next/image";

const HistoryOfBids = () => {
  // State for dynamic bid data
  const [bids, setBids] = useState([
    {
      id: 1,
      name: "Johhna Loren",
      location: "@queensland",
      amount: "624 ETH",
      imageUrl: "/images/user-86.png",
    },
    {
      id: 2,
      name: "Zara Loren",
      location: "@queensland",
      amount: "121.1 ETH",
      imageUrl: "/images/user-87.png",
    },
    {
      id: 3,
      name: "Walter White",
      location: "@queensland",
      amount: "24.78 ETH",
      imageUrl: "/images/user-88.png",
    },
    {
      id: 4,
      name: "Viktor James",
      location: "@queensland",
      amount: "72.8 ETH",
      imageUrl: "/images/user-89.png",
    },
    {
      id: 5,
      name: "Zinia Loren",
      location: "@queensland",
      amount: "986 ETH",
      imageUrl: "/images/user-90.png",
    },
    {
      id: 6,
      name: "Alex Dew",
      location: "@queensland",
      amount: "4857 ETH",
      imageUrl: "/images/user-60.jpg",
    },
    {
      id: 7,
      name: "Juhon Smith",
      location: "@queensland",
      amount: "7854 ETH",
      imageUrl: "/images/user-61.jpg",
    },
    {
      id: 8,
      name: "Kilva Dew",
      location: "@queensland",
      amount: "9864 ETH",
      imageUrl: "/images/user-62.jpg",
    },
  ]);

  return (
    <Card className="bg-white border-0 p-4 mb-4 rounded-10">
      <div className="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-1">
        <h3 className="mb-0">History Of Bids</h3>

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

      <div className="default-table-area style-two history-of-bids">
        <div className="table-responsive" data-simplebar>
          <table className="table align-middle border-0">
            <tbody>
              {bids.map((bid) => (
                <tr key={bid.id}>
                  <td>
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0">
                        <Image
                          src={bid.imageUrl}
                          className="rounded-circle"
                          alt={bid.name}
                          width={32}
                          height={32}
                        />
                      </div>
                      <div className="flex-grow-1 ms-2">
                        <h4 className="fs-14 fw-semibold mb-0">{bid.name}</h4>
                        <span className="fs-12">{bid.location}</span>
                      </div>
                    </div>
                  </td>
                  <td className="fs-12 fw-semibold text-body text-end">
                    {bid.amount}
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>
      </div>
    </Card>
  );
};

export default HistoryOfBids;
