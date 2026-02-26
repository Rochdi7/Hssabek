"use client";

import React, { useEffect, useState } from "react";
import { Card, Form } from "react-bootstrap";

const SupportOverview = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [55, 44, 30, 12];

  const options = {
    chart: {
      zoom: {
        enabled: false,
      },
      toolbar: {
        show: false,
      },
    },
    labels: ["Solved", "In Progress", "Pending", "Unassigned"],
    colors: ["#37D80A", "#605DFF", "#AD63F6", "#FD5812"],
    dataLabels: {
      enabled: false,
    },
    plotOptions: {
      pie: {
        expandOnClick: false,
      },
    },
    stroke: {
      width: 1,
      show: true,
      colors: ["#ffffff"],
    },
    legend: {
      show: true,
      fontSize: "12px",
      position: "bottom",
      horizontalAlign: "center",
      itemMargin: {
        horizontal: 8,
        vertical: 7,
      },
      labels: {
        colors: "#64748B",
      },
      markers: {
        shape: 'diamond',
        width: 9,
        radius: 2,
        height: 9,
        offsetX: -2,
        offsetY: -0.1,
      },
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-30">
            <h3 className="mb-0">Support Overview</h3>

            <Form.Select
              className="month-select form-control p-0 h-auto border-0"
              aria-label="Default select example"
            >
              <option defaultValue="0">This Day</option>
              <option defaultValue="1">This Weekly</option>
              <option defaultValue="2">This Monthly</option>
              <option defaultValue="3">This Yearly</option>
            </Form.Select>
          </div>

          <div className="t-chart">
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="pie"
                height={375}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default SupportOverview;
