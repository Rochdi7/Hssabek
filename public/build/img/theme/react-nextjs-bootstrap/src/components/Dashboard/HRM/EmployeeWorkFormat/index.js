"use client";

import React, { useEffect, useState } from "react";
import { Card, Dropdown } from "react-bootstrap";

const EmployeeWorkFormat = () => {
  const [Chart, setChart] = useState();
  const [chartData, setChartData] = useState({
    series: [],
    labels: [],
    details: [],
  });

  // Simulated API call
  const fetchChartData = async () => {
    // Replace this object with an actual API response
    const fetchedData = {
      series: [120, 160, 50, 20],
      labels: ["Remote", "In-office", "Hybrid", "Shift"],
      details: [
        { label: "Remote", value: 120, percentage: "35%", trend: "up" },
        { label: "In-office", value: 160, percentage: "45%", trend: "down" },
        { label: "Hybrid", value: 50, percentage: "15%", trend: "up" },
        { label: "Shift", value: 20, percentage: "5%", trend: "down" },
      ],
    };

    setChartData(fetchedData);
  };

  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
    fetchChartData();
  }, []);

  const options = {
    labels: chartData.labels,
    colors: ["#FD5812", "#605DFF", "#37D80A", "#AD63F6"],
    stroke: {
      width: 1,
      show: true,
      colors: ["#ffffff"],
    },
    legend: {
      show: false,
    },
    plotOptions: {
      pie: {
        expandOnClick: false,
        donut: {
          labels: {
            show: true,
            name: {
              color: "#64748B",
            },
            value: {
              show: true,
              color: "#64748B",
              fontSize: "16px",
              fontWeight: "600",
              offsetY: -6,
            },
            total: {
              show: true,
              color: "#64748B",
              fontSize: "14px",
              fontWeight: "400",
            },
          },
        },
      },
    },
    dataLabels: {
      enabled: false,
    },
    tooltip: {
      enabled: false,
    },
  };

  return (
    <>
      <Card className="border-0 rounded-3 bg-white mb-4">
        <div className="custom-padding-30">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
            <h3 className="mb-0">Employee Work Format</h3>
            
            <Dropdown className="action-opt">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="bg-transparent p-0 lh-1 ms-e-10"
              >
                <i className="material-symbols-outlined">more_vert</i>
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item href="#" className="d-flex align-items-center">
                  <i className="material-symbols-outlined">schedule</i> Today
                </Dropdown.Item>
                <Dropdown.Item href="#" className="d-flex align-items-center">
                  <i className="material-symbols-outlined">pie_chart</i> Last 7
                  Days
                </Dropdown.Item>
                <Dropdown.Item href="#" className="d-flex align-items-center">
                  <i className="material-symbols-outlined">refresh</i> Last
                  Month
                </Dropdown.Item>
                <Dropdown.Item href="#" className="d-flex align-items-center">
                  <i className="material-symbols-outlined">calendar_today</i>{" "}
                  Last 1 Year
                </Dropdown.Item>
                <Dropdown.Item href="#" className="d-flex align-items-center">
                  <i className="material-symbols-outlined">bar_chart</i> All
                  Time
                </Dropdown.Item>
                <Dropdown.Item href="#" className="d-flex align-items-center">
                  <i className="material-symbols-outlined">visibility</i> View
                </Dropdown.Item>
                <Dropdown.Item href="#" className="d-flex align-items-center">
                  <i className="material-symbols-outlined">delete</i> Delete
                </Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>

          <div style={{ margin: "-15px 0 -20px 0" }} className="t-chart">
            {Chart && (
              <Chart
                options={options}
                series={chartData.series}
                type="donut"
                height={256}
              />
            )}
          </div>
        </div>

        <ul className="ps-0 mb-0 list-unstyled l-lcbm">
          {chartData.details.map((item, index) => (
            <li
              key={index}
              className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3"
              style={{ padding: "0 30px" }}
            >
              <div
                className="d-flex align-items-center"
                style={{ width: "175px" }}
              >
                <div className="flex-grow-1">
                  <div className="d-flex align-items-center gap-2">
                    <span
                      className="d-inline-block"
                      style={{
                        backgroundColor: options.colors[index],
                        width: "8px",
                        height: "8px",
                      }}
                    ></span>
                    <span className="fw-medium text-secondary">
                      {item.label}
                    </span>
                  </div>
                </div>
                <span
                  className={`flex-shrink-0 d-flex align-items-center text-${
                    item.trend === "up" ? "success" : "danger"
                  }`}
                >
                  <div className="d-flex">
                    {item.percentage}
                    <i className="material-symbols-outlined fs-18 ms-1 position-relative top-1">
                      {item.trend === "up" ? "trending_up" : "trending_down"}
                    </i>
                  </div>
                </span>
              </div>
              <span className="fw-bold text-secondary">{item.value}</span>
            </li>
          ))}
        </ul>
      </Card>
    </>
  );
};

export default EmployeeWorkFormat;
