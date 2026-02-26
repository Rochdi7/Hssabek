"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const InstagramCampaigns = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Campaign Budget",
      data: [50, 40, 30, 50, 40, 30, 50],
    },
    {
      name: "Followers Goal",
      data: [11, 32, 45, 32, 34, 52, 41],
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
    },
    colors: ["#FF6D57", "#AD63F6"],
    dataLabels: {
      enabled: false,
    },
    grid: {
      show: false,
      borderColor: "#ECEEF2",
    },
    stroke: {
      curve: "smooth",
      width: 2,
    },
    xaxis: {
      categories: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
      axisTicks: {
        show: false,
        color: "#ECEEF2",
      },
      axisBorder: {
        show: false,
        color: "#ECEEF2",
      },
      labels: {
        show: false,
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
    },
    yaxis: {
      show: false,
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
          <div className="mb-4">
            <h3 className="mb-0">
              Instagram Campaigns{" "}
              <span className="bg-danger bg-opacity-10 text-danger fs-10 py-1 px-2 rounded-1">
                Live Now
              </span>
            </h3>
          </div>

          <div className="d-flex justify-content-between mb-3">
            <div>
              <div className="d-flex align-items-center mb-2">
                <span
                  className="d-inline-block rounded-circle bg-primary-div position-relative top-1"
                  style={{ width: "10px", height: "10px" }}
                ></span>
                <span className="ms-2">Campaign Budget</span>
              </div>
              <h3 className="fs-24 mb-0">$3200</h3>
            </div>

            <div>
              <div className="d-flex align-items-center mb-2">
                <span
                  className="d-inline-block rounded-circle bg-danger position-relative top-1"
                  style={{ width: "10px", height: "10px" }}
                ></span>
                <span className="ms-2">Followers Goal</span>
              </div>
              <h3 className="fs-24 mb-0">140,000</h3>
            </div>
          </div>

          <div style={{ margin: "-55px -11px -30px -12px" }}>
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="area"
                height={150}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default InstagramCampaigns;
