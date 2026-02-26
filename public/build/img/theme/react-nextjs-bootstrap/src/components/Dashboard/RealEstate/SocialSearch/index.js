"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const SocialSearch = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [90, 80, 70, 60];

  const options = {
    plotOptions: {
      radialBar: {
        dataLabels: {
          name: {
            fontSize: "14px",
          },
          value: {
            fontSize: "14px",
          },
          total: {
            show: true,
            label: "Total",
            formatter: function (w) {
              // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
              return 249;
            },
          },
        },
        hollow: {
          margin: 10,
          size: "40%",
          background: "transparent",
        },
      },
    },
    labels: ["LinkedIn", "Twitter", "Facebook", "Instagram"],
    colors: ["#AD63F6", "#3584FC", "#37D80A", "#FD5812"],
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-4">
            <h3 className="mb-0">Social Search</h3>
            <span>Total Traffic In This Week</span>
          </div>

          <div style={{ margin: "-20px 0 -22px 0" }}>
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="radialBar"
                height={230}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default SocialSearch;
