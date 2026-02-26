"use client";

import React, { useState, useEffect } from "react";
import Image from "next/image";
import { Card, Dropdown } from "react-bootstrap";

const ActiveUsers = () => {
  const [users, setUsers] = useState([]);

  useEffect(() => {
    // This could be an API call
    const fetchData = async () => {
      const data = [
        {
          id: 1,
          name: "Johhna Loren",
          role: "Admin",
          image: "/images/user-92.png",
          status: "online",
        },
        {
          id: 2,
          name: "Zinia Watson Loren",
          role: "Moderator",
          image: "/images/user-93.png",
          status: "online",
        },
        {
          id: 3,
          name: "Angela Carter",
          role: "Editor",
          image: "/images/user-94.png",
          status: "online",
        },
        {
          id: 4,
          name: "Skyler White",
          role: "Admin",
          image: "/images/user-95.png",
          status: "offline",
        },
        {
          id: 5,
          name: "Jane Ronan",
          role: "Editor",
          image: "/images/user-96.png",
          status: "online",
        },
        {
          id: 6,
          name: "Viktor James",
          role: "Editor",
          image: "/images/user-97.png",
          status: "offline",
        },
      ];
      setUsers(data);
    };

    fetchData();
  }, []);

  return (
    <Card className="bg-white border-0 rounded-3 mb-4">
      <Card.Body className="p-4">
        <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 border-bottom pb-4">
          <h3 className="mb-0">Active Users</h3>

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

        {users.map((user) => (
          <div
            key={user.id}
            className="d-flex align-items-center border-bottom pb-3 mb-3 lcbmp-none"
          >
            <div className="flex-shrink-0">
              <div className="position-relative">
                <Image
                  src={user.image}
                  className="rounded-circle"
                  alt="user"
                  width={33}
                  height={33}
                />
                <div
                  className={`position-absolute p-1 ${
                    user.status === "online" ? "bg-success" : "bg-danger"
                  } border border-2 border-white rounded-circle status-position2 bottom-0`}
                ></div>
              </div>
            </div>
            <div className="flex-grow-1 ms-3">
              <h4 className="fs-14 fw-semibold mb-0">{user.name}</h4>
              <span className="fs-12">{user.role}</span>
            </div>
          </div>
        ))}
      </Card.Body>
    </Card>
  );
};

export default ActiveUsers;
