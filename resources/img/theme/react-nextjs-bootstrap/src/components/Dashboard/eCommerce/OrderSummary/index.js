"use client";

import React, { useEffect, useState } from "react";
import { Card, Form, ProgressBar } from "react-bootstrap";

const OrderSummary = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [60, 30, 10];

  const options = {
    labels: ["Completed", "New Order", "Pending"],
    colors: ["#37D80A", "#605DFF", "#AD63F6"],
    legend: {
      show: true,
      position: "top",
      fontSize: "12px",
      horizontalAlign: "center",
      itemMargin: {
        horizontal: 8,
        vertical: 0,
      },
      labels: {
        colors: "#64748B",
      },
      markers: {
        shape: 'diamond',
        width: 9,
        height: 9,
        offsetX: -2,
        offsetY: -0.5,
      },
    },
    dataLabels: {
      enabled: false,
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-4">
            <h3 className="mb-0">Order Summary</h3>

            <div>
              <Form.Select
                className="month-select form-control"
                aria-label="Default select example"
              >
                <option defaultValue="0">Select</option>
                <option defaultValue="1">Today</option>
                <option defaultValue="2">Weekly</option>
                <option defaultValue="3">Monthly</option>
                <option defaultValue="4">Yearly</option>
              </Form.Select>
            </div>
          </div>

          <div className="pt-4 t-chart">
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="donut"
                height={300}
              />
            )}
          </div>

          <ul className="ps-0 mb-0 list-unstyled sales_by_locations style-two">
            <li>
              <span className="fw-medium d-block mb-2">Completed Order</span>

              <div>
                <ProgressBar variant="success" now={60} />
                <span className="count fw-medium text-body">60%</span>
              </div>
            </li>
            <li>
              <span className="fw-medium d-block mb-2">New Order</span>

              <div>
                <ProgressBar variant="primary" now={30} />
                <span className="count fw-medium text-body">30%</span>
              </div>
            </li>
            <li>
              <span className="fw-medium d-block mb-2">Pending Order</span>

              <div>
                <ProgressBar variant="warning" now={10} />
                <span className="count fw-medium text-body">10%</span>
              </div>
            </li>
          </ul>
        </Card.Body>
      </Card>
    </>
  );
};

export default OrderSummary;
