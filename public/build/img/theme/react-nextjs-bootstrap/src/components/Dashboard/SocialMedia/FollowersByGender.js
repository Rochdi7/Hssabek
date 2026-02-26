"use client";

import React, { useEffect, useState } from "react";
import { Card, Dropdown } from "react-bootstrap";

const FollowersByGender = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [55, 45];

  const options = {
    labels: ["Female Followers", "Male Followers"],
    colors: ["#605DFF", "#AD63F6"],
    dataLabels: {
      enabled: false,
      style: {
        fontSize: "10px",
        fontFamily: "Inter",
        colors: ["#fff"],
      },
      dropShadow: {
        enabled: true,
        top: 0,
        left: 0,
        blur: 0,
        color: "#000",
        opacity: 0,
      },
    },
    plotOptions: {
      pie: {
        expandOnClick: false,
      },
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return val + "%";
        },
      },
    },
    stroke: {
      width: 1,
      show: true,
      colors: ["#ffffff"],
    },
    legend: {
      show: false,
      position: "bottom",
      horizontalAlign: "center",
      fontWeight: 400,
      fontFamily: "Inter",
      fontSize: "12",
      offsetY: 0,
      labels: {
        colors: ["#64748B", "#64748B"],
      },
      itemMargin: {
        horizontal: 10,
        vertical: 5,
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
    <Card className="custom-shadow rounded-3 bg-white border mb-4 pb-3">
      <div className="p-4">
        <div className="d-flex justify-content-between align-items-center gap-1 mb-3 mb-lg-4">
          <div>
            <h3 className="mb-0 fs-20 fw-semibold">Followers by Gender</h3>
            <span className="fw-normal fs-14" style={{ color: "#8695aa" }}>
              Understand your audience better!
            </span>
          </div>

          <Dropdown className="action-opt -right-10">
            <Dropdown.Toggle
              variant="secondary"
              id="dropdown-basic"
              className="bg-transparent p-0"
            >
              <i className="material-symbols-outlined">more_vert</i>
            </Dropdown.Toggle>

            <Dropdown.Menu className="bg-white border box-shadow">
              <Dropdown.Item href="#">
                <i className="material-symbols-outlined">schedule</i>
                Today
              </Dropdown.Item>
              <Dropdown.Item href="#">
                <i className="material-symbols-outlined">pie_chart</i>
                Last 7 Days
              </Dropdown.Item>
              <Dropdown.Item href="#">
                <i className="material-symbols-outlined">refresh</i>
                Last Month
              </Dropdown.Item>
              <Dropdown.Item href="#">
                <i className="material-symbols-outlined">calendar_today</i>
                Last 1 Year
              </Dropdown.Item>
              <Dropdown.Item href="#">
                <i className="material-symbols-outlined">bar_chart</i>
                All Time
              </Dropdown.Item>
              <Dropdown.Item href="#">
                <i className="material-symbols-outlined">visibility</i>
                View
              </Dropdown.Item>
              <Dropdown.Item href="#">
                <i className="material-symbols-outlined">delete</i>
                Delete
              </Dropdown.Item>
            </Dropdown.Menu>
          </Dropdown>
        </div>

        <div className="text-center mb-3">
          <h3 className="fs-16 fw-medium mb-0">54,500</h3>
          <span className="fs-12">Total Followers</span>
        </div>

        <div>
          {Chart && (
            <Chart options={options} series={series} type="pie" height={192} />
          )}
        </div>

        <div className="d-flex flex-wrap gap-2 mt-2 pt-1 justify-content-between align-items-center">
          <div className="d-flex gap-2">
            <span
              className="d-inline-block bg-primary rounded-circle position-relative top-2"
              style={{
                width: "10px",
                height: "10px",
              }}
            ></span>
            <div>
              <span className="fw-medium text-secondary d-block lh-1">55%</span>
              <span className="fs-12">Male Followers</span>
            </div>
          </div>

          <div className="d-flex  gap-2">
            <span
              className="d-inline-block bg-primary-div rounded-circle position-relative top-2"
              style={{
                width: "10px",
                height: "10px",
              }}
            ></span>
            <div>
              <span className="fw-medium text-secondary d-block lh-1">43%</span>
              <span className="fs-12">Female Followers</span>
            </div>
          </div>
        </div>
      </div>
    </Card>
  );
};

export default FollowersByGender;
