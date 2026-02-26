"use client";

import React, { useEffect, useState } from "react";
import { Card, Form } from "react-bootstrap";

const BalanceOverview = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Revenue",
      data: [5, 12, 20, 23, 25, 30, 40, 45, 50, 70, 65, 80],
    },
    {
      name: "Expenses",
      data: [15, 20, 30, 30, 35, 45, 60, 70, 80, 85, 95, 120],
    },
  ];

  const options = {
    chart: {
      zoom: {
        enabled: false,
      },
      toolbar: {
        show: true,
      },
    },

    colors: ["#AD63F6", "#605DFF"],
    dataLabels: {
      enabled: false,
    },
    grid: {
      show: true,
      borderColor: "#ECEEF2",
    },
    stroke: {
      curve: "straight",
      width: 2,
    },
    xaxis: {
      categories: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
      ],
      axisTicks: {
        show: false,
        color: "#ECEEF2",
      },
      axisBorder: {
        show: false,
        color: "#ECEEF2",
      },
      labels: {
        show: true,
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
    },
    yaxis: {
      tickAmount: 6,
      max: 150,
      min: 0,
      labels: {
        formatter: (val) => {
          return "$" + val + "k";
        },
        style: {
          colors: "#64748B",
          fontSize: "12px",
        },
      },
      axisBorder: {
        show: false,
        color: "#ECEEF2",
      },
      axisTicks: {
        show: false,
        color: "#ECEEF2",
      },
    },
    legend: {
      show: true,
      position: "top",
      fontSize: "12px",
      horizontalAlign: "left",
      itemMargin: {
        horizontal: 8,
        vertical: 0,
      },
      labels: {
        colors: "#64748B",
      },
      markers: {
        width: 9,
        height: 9,
        offsetX: -2,
        offsetY: -0.5,
        radius: 2,
        shape: 'diamond',
      },
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4 z-0">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-30">
            <h3 className="mb-0">Balance Overview</h3>

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

          <div
            style={{
              marginLeft: "-10px",
              marginTop: "-5px",
            }}
          >
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="area"
                height={350}
              />
            )}
          </div>

          <ul className="ps-0 mb-0 list-unstyled d-flex flex-wrap gap-4 justify-content-center">
            <li className="d-flex align-items-center">
              <h4 className="fs-20 fw-semibold text-primary me-2 mb-0">
                $628k
              </h4>
              <span className="fs-12">Revenue</span>
            </li>

            <li className="d-flex align-items-center">
              <h4 className="fs-20 fw-semibold text-primary-div me-2 mb-0">
                $379k
              </h4>
              <span className="fs-12">Expenses</span>
            </li>

            <li className="d-flex align-items-center">
              <h4 className="fs-20 fw-semibold text-success me-2 mb-0">
                11.2%
              </h4>
              <span className="fs-12">Profit Ratio</span>
            </li>
          </ul>
        </Card.Body>
      </Card>
    </>
  );
};

export default BalanceOverview;
