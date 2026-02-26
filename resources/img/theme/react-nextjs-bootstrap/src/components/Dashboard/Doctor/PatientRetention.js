"use client";

import React, { useEffect, useState } from "react";
import { Card, Dropdown } from "react-bootstrap";

const PatientRetention = () => {
  const [Chart, setChart] = useState(null);

  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    { name: "Old Patient", data: [12, 15, 10, 8, 14] },
    { name: "New Patient", data: [9, 11, 8, 6, 12] }
  ];

  const categories = ['8 AM', '10 AM', '12 PM', '2 PM', '4 PM'];

  const options = {
    chart: {
      toolbar: {
        show: false,
      },
    },
    colors: ["#26A0FC", "#26E7A6"],
    dataLabels: {
      enabled: false,
    },
    stroke: {
      width: 5,
      curve: "straight",
      dashArray: [0, 8, 5],
    },
    grid: {
      show: true,
      borderColor: "#ECF0FF",
    },
    xaxis: {
      categories: categories,
      axisTicks: {
        show: true,
        color: "#E0E0E0",
      },
      axisBorder: {
        show: true,
        color: "#E0E0E0",
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
      min: 0,
      labels: {
        show: true,
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
      axisBorder: {
        show: false,
        color: "#E0E0E0",
      },
      axisTicks: {
        show: false,
        color: "#E0E0E0",
      },
    },
    legend: {
      show: true,
      fontSize: "12px",
      position: "bottom",
      horizontalAlign: "center",
      itemMargin: {
        horizontal: 8,
        vertical: 10,
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
            <h3 className="mb-0">Patient Retention</h3>

            <Dropdown className="action-opt">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="bg-transparent p-0"
              >
                <i className="material-symbols-outlined">more_horiz</i>
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item href="#">
                  This Day
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  This Week
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  This Month
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  This Year
                </Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>

          <div
            style={{
              margin: "-24px -4px -20px -18px",
            }}
          >
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="line"
                height={318}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default PatientRetention;