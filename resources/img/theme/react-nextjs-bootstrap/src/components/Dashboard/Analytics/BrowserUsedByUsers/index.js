"use client";

import React, { useState } from "react";
import { Card, Form, Table } from "react-bootstrap";
import Image from "next/image";

const BrowserUsedByUsers = () => {
  const [browserData] = useState([
    {
      name: "Google Chrome",
      icon: "/images/chrome.png",
      users: "58.4%",
      sessions: "12,345",
      bounceRate: "34.2%",
      avgSessionDuration: "3m 15s"
    },
    {
      name: "Safari",
      icon: "/images/safari.png",
      users: "20.3%",
      sessions: "7,890",
      bounceRate: "40.5%",
      avgSessionDuration: "4m 12s"
    },
    {
      name: "Microsoft Edge",
      icon: "/images/edge.png",
      users: "10.8%",
      sessions: "5,678",
      bounceRate: "28.9%",
      avgSessionDuration: "3m 50s"
    },
    {
      name: "Mozilla Firefox",
      icon: "/images/firefox.png",
      users: "7.2%",
      sessions: "4,567",
      bounceRate: "32.1%",
      avgSessionDuration: "2m 45s"
    },
    {
      name: "Opera",
      icon: "/images/opera.png",
      users: "2.1%",
      sessions: "1,234",
      bounceRate: "38.0%",
      avgSessionDuration: "2m 10s"
    },
    {
      name: "Other",
      icon: "/images/other.png",
      users: "1.2%",
      sessions: "987",
      bounceRate: "50.0%",
      avgSessionDuration: "1m 30s"
    },
  ]);

  return (
    <Card className="bg-white border-0 rounded-3 mb-4">
      <Card.Body className="p-4">
        <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 pb-4">
          <h3 className="mb-0">Browser Used By Users</h3>

          <Form.Select
            className="form-select month-select form-control p-0 h-auto border-0 pe-4 w-auto"
          >
            <option defaultValue="0">July 01 - July 31, 2024</option>
            <option defaultValue="1">August 01 - August 31, 2024</option>
            <option defaultValue="2">September 01 - September 30, 2024</option>
          </Form.Select>
        </div>

        <div className="default-table-area style-two browser-leads">
          <div 
            className="table-responsive"
            style={{ 
              maxHeight: '282px',
              overflowY: 'auto'
            }}
          >
            <Table className="align-middle border-0 analytics-bu-by-users">
              <thead>
                <tr className="border-bottom">
                  <th scope="col" className="text-center bg-transparent">Browser</th>
                  <th scope="col" className="text-end bg-transparent">Users (%)</th>
                  <th scope="col" className="text-end bg-transparent">Sessions</th>
                  <th scope="col" className="text-end bg-transparent">Bounce Rate (%)</th>
                  <th scope="col" className="text-end bg-transparent">Avg. Session Duration</th>
                </tr>
              </thead>
              <tbody>
                {browserData.map((browser, index) => (
                  <tr key={index}>
                    <td>
                      <div className="d-flex align-items-center">
                        <Image
                          src={browser.icon}
                          className="wh-16 rounded-circle"
                          alt={browser.name}
                          width={16}
                          height={16}
                        />
                        <div className="ms-2">
                          <h6 className="fw-medium fs-14 m-0">{browser.name}</h6>
                        </div>
                      </div>
                    </td>
                    <td className="text-end fw-medium">{browser.users}</td>
                    <td className="text-end fw-medium">{browser.sessions}</td>
                    <td className="text-end fw-medium">{browser.bounceRate}</td>
                    <td className="text-end fw-medium">{browser.avgSessionDuration}</td>
                  </tr>
                ))}
              </tbody>
            </Table>
          </div>
        </div>
      </Card.Body>
    </Card>
  );
};

export default BrowserUsedByUsers;
