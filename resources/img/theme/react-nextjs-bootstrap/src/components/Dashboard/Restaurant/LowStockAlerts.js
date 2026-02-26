"use client";

import React, { useEffect, useState } from "react";
import { Card, Dropdown } from "react-bootstrap";

const LowStockAlerts = () => {
  const [lowStockItems, setLowStockItems] = useState([]);

  useEffect(() => {
    // Simulate an API call or data fetch
    const mockLowStockItems = [
      { id: 1, name: "Thai Bean Soup", quantity: 1 },
      { id: 2, name: "Banana Shake", quantity: 3 },
      { id: 3, name: "Chicken Tandoori", quantity: 5 },
      { id: 4, name: "Thai Chicken Masala", quantity: 5 },
      { id: 5, name: "Chicken Club Sandwich", quantity: 6 },
      { id: 6, name: "Shrimp Fried Rice", quantity: 2 },
    ];

    setLowStockItems(mockLowStockItems);
  }, []);

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div
            className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4"
       
          >
            <h3 className="mb-0 text-text-secondary-50">Low Stock Alert</h3>

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

          <ul className="p-0 m-0 list-unstyled">
            {lowStockItems.map((item) => (
              <li
                key={item.id}
                className="d-flex justify-content-between align-items-center border-bottom border-border-color-50 lcbmp-none"
                style={{
                  paddingBottom: '17.8px',
                  marginBottom: '17.8px'
                }}
              >
                <h3 className="fs-14 fw-semibold m-0">{item.name}</h3>
                <span className="fs-14 fw-bold text-danger">
                  {item.quantity}
                </span>
              </li>
            ))}
          </ul>
        </Card.Body>
      </Card>
    </>
  );
};

export default LowStockAlerts;
