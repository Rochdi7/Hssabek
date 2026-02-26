"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const ActiveUser = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [1000, 825, 825];

  const options = {
    labels: ["Active User", "Total User", "Bunch User"],
    colors: ["#5DA8FF", "#58F229", "#757DFF"],
    stroke: {
      width: 1,
      show: true,
      colors: ["#ffffff"],
    },
    legend: {
      show: false,
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
        size: 7,
        offsetX: -2,
        offsetY: -0.5,
        shape: "diamond",
      },
    },
    plotOptions: {
      pie: {
        expandOnClick: false,
        donut: {
          labels: {
            show: false,
            name: {
              color: "#64748B",
            },
            value: {
              show: true,
              color: "#3A4252",
              fontSize: "22px",
              fontWeight: "600",
            },
            total: {
              show: true,
              color: "#64748B",
            },
          },
        },
      },
    },
    dataLabels: {
      enabled: false,
    },
    tooltip: {
      enabled: true,
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center position-relative">
            <div className="flex-grow-1 me-3">
              <span className="d-block mb-2">Active User</span>

              <h3 className="fs-24 fw-bold">241K</h3>

              <span className="bg-success bg-opacity-10 border border-success rounded-pill text-success px-2 fs-12 fw-medium d-inline-block">
                +5.4%
              </span>
            </div>

            <div className="position-absolute top-50 end-0 translate-middle-y saas-chart-position">
              <div style={{ width: "95px" }} className="t-chart">
                {Chart && (
                  <Chart
                    options={options}
                    series={series}
                    type="donut"
                    height={85}
                  />
                )}
              </div>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default ActiveUser;
