"use client";

import React, { useEffect, useState } from "react";
import { Card, Form } from "react-bootstrap";

const TasksOverview = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [55, 44, 30, 12, 22];

  const options = {
    chart: {
      toolbar: {
        show: false,
      },
    },
    labels: ["Completed", "In Progress", "Pending", "Active", "Cancelled"],
    colors: ["#37D80A", "#605DFF", "#AD63F6", "#3584FC", "#FD5812"],
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
        shape: "diamond",
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
            <h3 className="mb-0">Tasks Overview</h3>

            <Form.Select
              className="month-select form-control p-0 h-auto border-0"
              aria-label="Default select example"
            >
              <option value="0">This Day</option>
              <option value="1">This Weekly</option>
              <option value="2">This Monthly</option>
              <option value="3">This Yearly</option>
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

export default TasksOverview;
