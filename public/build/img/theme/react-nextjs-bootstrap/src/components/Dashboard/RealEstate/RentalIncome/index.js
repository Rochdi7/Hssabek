"use client";

import React, { useEffect, useState } from "react";
import { Card, Dropdown } from "react-bootstrap";

const RentalIncome = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Time Spent",
      data: [400, 500, 300, 650, 220, 400, 380, 750, 350, 250, 200, 100],
    },
  ];

  const options = {
    chart: {
      toolbar: {
        show: false,
      },
    },
    colors: ["#605DFF"],
    plotOptions: {
      bar: {
        columnWidth: "55%",
      },
    },
    grid: {
      borderColor: "#ECF0FF",
      strokeDashArray: 4,
      xaxis: {
        lines: {
          show: false,
        },
      },
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      width: 4,
      show: true,
      colors: ["transparent"],
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
      tickAmount: 4,
      min: 0,
      labels: {
        formatter: (val) => {
          return "$" + val / 1 + "K";
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
    tooltip: {
      y: {
        formatter: function (val) {
          return val + " hours";
        },
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
        shape: "diamond",
      },
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return "" + val + "k";
        },
      },
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-4">
            <h3 className="mb-0">Rental Income</h3>

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

          <div style={{ margin: "-25px -21px -28px -18px" }}>
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="bar"
                height={255}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default RentalIncome;
