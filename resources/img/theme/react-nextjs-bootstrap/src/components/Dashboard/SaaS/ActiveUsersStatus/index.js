"use client";

import React, { useEffect, useState } from "react";
import { Card, Form } from "react-bootstrap";

const ActiveUsersStatus = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Active Users",
      data: [20, 15, 25, 95, 25, 65, 15, 25, 15, 20],
    },
  ];

  const options = {
    chart: {
      toolbar: {
        show: false,
      },
    },
    colors: ["#605DFF", "#AD63F6", "#3584FC", "#FD5812"],
    plotOptions: {
      bar: {
        columnWidth: "15%",
        borderRadius: 5,
      },
    },
    grid: {
      show: true,
      borderColor: "#ECF0FF",
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      width: 3,
      show: true,
      colors: ["transparent"],
    },
    xaxis: {
      categories: [
        "Oct 01",
        "Oct 02",
        "Oct 03",
        "Oct 04",
        "Oct 05",
        "Oct 06",
        "Oct 07",
        "Oct 08",
        "Oct 09",
        "Oct 10",
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
      tickAmount: 5,
      max: 100,
      min: 0,
      labels: {
        formatter: (val) => {
          return "$" + val + "K";
        },
        style: {
          colors: "#8695AA",
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
      show: false,
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
        size: 7,
        offsetX: -2,
        offsetY: -0.5,
        shape: "diamond",
      },
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-30">
            <h3 className="mb-0">Active Users</h3>

            <Form.Select
              className="month-select form-control w-135 bg-border-color border-color"
              aria-label="Default select example"
            >
              <option value="0">Monthly</option>
              <option value="1">Yearly</option>
            </Form.Select>
          </div>

          <div style={{ margin: "-24px -9px -27px -17px" }}>
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="bar"
                height={410}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default ActiveUsersStatus;
