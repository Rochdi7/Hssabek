"use client";

import React, { useEffect, useState } from "react";
import { Card, Dropdown } from "react-bootstrap";

const LinkedinNetFollowers = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Followers",
      data: [250, 150, 250, 120, 350, 150, 250],
    },
  ];

  const options = {
    chart: {
      zoom: {
        enabled: false,
      },
      toolbar: {
        show: false,
      },
      dropShadow: {
        enabled: true,
        enabledOnSeries: [0], // Apply shadow to the correct series index
        top: 5,
        left: 5,
        blur: 3,
        opacity: 0.6,
        color: "#605DFF", // Custom color for the shadow
      },
    },
    colors: ["#605DFF", "#DDE4FF"],
    dataLabels: {
      enabled: false,
    },
    stroke: {
      curve: "smooth",
      width: [1],
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
    fill: {
      type: "gradient",
      gradient: {
        stops: [0, 90, 100],
        shadeIntensity: 1,
        opacityFrom: 0.4,
        opacityTo: 0.0,
      },
    },
    xaxis: {
      categories: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
      axisTicks: {
        show: false,
        color: "#B1BBC8",
      },
      axisBorder: {
        show: true,
        color: "#D5D9E2",
      },
      labels: {
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
    },
    yaxis: {
      tickAmount: 5,
      max: 450,
      min: 0,
      axisBorder: {
        show: true,
        color: "#D5D9E2",
      },
      labels: {
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
    },
    legend: {
      show: true,
      position: "top",
      fontSize: "12px",
      horizontalAlign: "left",
      fontFamily: "Inter",
      fontWeight: 400,
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
  };

  return (
    <>
      <Card className="custom-shadow rounded-3 bg-white border mb-4">
        <div className="p-4">
          <div className="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-4">
            <div>
              <h3 className="fs-20 fw-semibold mb-0">Linkedin Net Followers</h3>
              <span style={{ color: "#8695aa" }}>
                Net followers growth: +275
              </span>
            </div>

            <Dropdown className="dropdown select-dropdown">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="dropdown-toggle bg-transparent border text-body rounded-2"
                style={{
                  paddingRight: "35px",
                }}
              >
                Last Week
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

          <div className="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-4">
            <div>
              <h3 className="fs-14 fw-medium mb-0">56,100</h3>
              <span className="fs-12" style={{ color: "#8695aa" }}>
                Starting Followers
              </span>
            </div>

            <div>
              <h3 className="fs-14 fw-medium mb-0">300</h3>
              <span className="fs-12" style={{ color: "#8695aa" }}>
                New Followers
              </span>
            </div>

            <div>
              <h3 className="fs-14 fw-medium mb-0">25</h3>
              <span className="fs-12" style={{ color: "#8695aa" }}>
                Unfollows
              </span>
            </div>

            <div>
              <h3 className="fs-14 fw-medium mb-0">56,375</h3>
              <span className="fs-12" style={{ color: "#8695aa" }}>
                Ending Followers
              </span>
            </div>
          </div>

          <div style={{ margin: "-24px -10px -28px -17px" }}>
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="area"
                height={287}
              />
            )}
          </div>
        </div>
      </Card>
    </>
  );
};

export default LinkedinNetFollowers;
