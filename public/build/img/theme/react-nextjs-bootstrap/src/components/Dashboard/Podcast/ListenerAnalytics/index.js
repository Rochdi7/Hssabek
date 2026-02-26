"use client";

import React, { useEffect, useState } from "react";
import { Card, Dropdown } from "react-bootstrap";
import SalesByGender from "./SalesByGender";

const ListenerAnalytics = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Men",
      data: [50, 30, 40, 35, 30],
    },
    {
      name: "Woman",
      data: [25, 40, 30, 45, 25],
    },
  ];

  const options = {
    chart: {
      toolbar: {
        show: false,
      },
    },
    colors: ["#605DFF", "#9CAAFF"],
    plotOptions: {
      bar: {
        columnWidth: "32%",
        borderRadius: 6,
        borderRadiusApplication: "end",
      },
    },
    fill: {
      type: ["gradient", "solid"], // Apply gradient only to the first series
      gradient: {
        shade: "light",
        type: "vertical",
        shadeIntensity: 0.5,
        gradientToColors: ["#9747FF"], // End color for the gradient
        inverseColors: false,
        opacityFrom: 1,
        opacityTo: 1,
        stops: [0, 100],
      },
    },
    grid: {
      borderColor: "#ECEEF2",
      strokeDashArray: 8,
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
      width: 3,
      show: true,
      colors: ["transparent"],
    },
    xaxis: {
      categories: ["18-24", "25-34", "35-44", "45-65", "65+"],
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
          fontFamily: "Inter",
        },
      },
    },
    yaxis: {
      tickAmount: 3,
      max: 60,
      min: 0,
      labels: {
        style: {
          colors: "#64748B",
          fontSize: "12px",
          fontFamily: "Inter",
        },
        formatter: (val) => {
          return "" + val / 1 + "%";
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
      fontFamily: "Inter",
      fontWeight: 400,
      offsetY: 10,
      itemMargin: {
        horizontal: 8,
        vertical: 60,
      },
      labels: {
        colors: "#3A4252",
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
  };

  return (
    <>
      <Card className="custom-shadow rounded-3 bg-white border mb-4 custom-padding-30 position-relative">
        <div
          className="d-flex justify-content-between align-items-center flex-wrap gap-3 position-relative pb-4"
          style={{
            top: "-5px",
          }}
        >
          <h3 className="mb-0 fs-18 fw-semibold">Listener Analytics</h3>

          <Dropdown
            className="dropdown select-dropdown without-border position-relative"
            style={{
              right: "-10px",
              top: "2px",
            }}
          >
            <Dropdown.Toggle
              variant="secondary"
              id="dropdown-basic"
              className="dropdown-toggle bg-transparent border text-body rounded-2"
              style={{
                paddingRight: "20px",
              }}
            >
              Last 28 days
            </Dropdown.Toggle>

            <Dropdown.Menu className="bg-white border box-shadow">
              <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                Last 28 days
              </Dropdown.Item>

              <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                Last 48 days
              </Dropdown.Item>

              <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                Last 90 days
              </Dropdown.Item>

              <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                Last Year
              </Dropdown.Item>
            </Dropdown.Menu>
          </Dropdown>
        </div>

        <div style={{ margin: "-29px -27px -28px -16px" }}>
          {Chart && (
            <Chart options={options} series={series} type="bar" height={382} />
          )}
        </div>

        <div
          className="position-absolute position-for-mobile"
          style={{
            top: "92px",
            right: "30px",
          }}
        >
          <div className="d-flex align-items-center">
            <div style={{ margin: "0" }}>
              <SalesByGender />
            </div>

            <ul
              className="ps-0 mb-0 list-unstyled last-child-none"
              style={{
                marginLeft: "-110px",
              }}
            >
              <li className="d-flex align-items-center mb-2">
                <span
                  className="d-inline-block bg-primary-div rounded-circle"
                  style={{
                    width: "10px",
                    height: "10px",
                    marginRight: "7px",
                  }}
                ></span>
                <span className="fs-12 text-secondary">
                  Men: <span className="fw-medium">75%</span>
                </span>
              </li>

              <li className="d-flex align-items-center">
                <span
                  className="d-inline-block bg-card-bg-c rounded-circle"
                  style={{
                    width: "10px",
                    height: "10px",
                    marginRight: "7px",
                  }}
                ></span>
                <span className="fs-12 text-secondary">
                  Woman: <span className="fw-medium">25%</span>
                </span>
              </li>
            </ul>
          </div>
        </div>
      </Card>
    </>
  );
};

export default ListenerAnalytics;
